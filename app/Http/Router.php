<?php

namespace App\Http;

use \Closure;
use \Exception;
use ReflectionFunction;

class Router{

    // complete root url
    private $url = '';

    // prefix, ie: localhost/xxx
    private $prefix = '';

    // route index
    private $routes = [];

    // request instance
    private $request;

    // method responsible of starting the class
    public function __construct($url){

        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    private function setPrefix(){
        // current url information
        $parseUrl = parse_url($this->url);

        // define prefix
        $this->prefix = $parseUrl['path'] ?? '' ;        
    }

    private function addRoute($method, $route, $params = []){
        
        // params validation
        foreach($params as $key => $value){
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        // route variables
        $params['variables'] = [];

        // variables validation pattern
        $patternVariable = '/{(.*?)}/';
        if(preg_match_all($patternVariable, $route, $matches)){
            $route = preg_replace($patternVariable, '(.*?)', $route );
            $params['variables'] = $matches[1];
            
        }
        
        // url validation pattern
        $patternRoute = '/^' . str_replace('/','\/', $route) . '$/';

        // add route inside class
        $this->routes[$patternRoute][$method] = $params;

    }

    /**
     * Define GET route
     */
    public function get($route,$params = []){
        return $this->addRoute('GET', $route, $params);
    }

    /**
     * Define POST route
     */
    public function post($route,$params = []){
        return $this->addRoute('POST', $route, $params);
    }

    /**
     * Define PUT route
     */
    public function put($route,$params = []){
        return $this->addRoute('PUT', $route, $params);
    }

    /**
     * Define DELETE route
     */
    public function delete($route,$params = []){
        return $this->addRoute('DELETE', $route, $params);
    }


    /**
     * returns uri disconsidering the prefix
     */
    private function getUri(){
        
        // request uri
        $uri = $this->request->getUri();

        // slices the uri with prefix
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];

        // return uri without prefix
        return end($xUri);

    }

    private function getRoute(){

        $uri = $this->getUri();

        // method
        $httpMethod = $this->request->getHttpMethod();

        // validate routes
        foreach($this->routes as $patternRoute => $methods){
            if(preg_match($patternRoute,$uri, $matches)){
                // check method
                if(isset($methods[$httpMethod])){
                    unset($matches[0]);

                    // get keys
                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys, $matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;
                    
                    return $methods[$httpMethod];
                }
                // method not allowed or not defined
                throw new Exception("Method not allowed (getRoute)", 405 );
            }
        }
        // URL not found
        throw new Exception("URL not found - Route not implemented (Router.php > getRoute)", 404 );
    }

    /**
     * executes the current route
     */
    public function run(){
        try{
            $route = $this->getRoute();
           
            // check if controller exists
            if(!isset($route['controller'])){
                throw new Exception("URL cannot be processed. (Router.php > undefined controller)", 500);
            }

            $args = [];

            // reflection
            $reflection = new ReflectionFunction($route['controller']);

            foreach($reflection->getParameters() as $parameter){
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';

            }

            // returns the function execution
            return call_user_func_array($route['controller'], $args);
        }
        catch(Exception $e){
            return new Response($e->getCode(), $e->getMessage());
        }
    }
    

}