<?php

namespace App\Http;

class Request{
 
    /**
     * Http Method of request
     * @var string
     */
    private $httpMethod;

    /**
     *  page Uri
     * @var string
     */
    private $uri;

    /**
     * URL parameters ($_GET)
     * @var array
     */
    private $queryParams = [];

    /**
     * POST vars of page ($_POST)
     * @var array
     */
    private $postVars = [];

    /**
     * request header
     * @var array
     */
    private $headers = [];   
    

    /**
     * class constructor
     */
    public function __construct()
    {
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';       
        
    }

    public function getHttpMethod(){
        return $this->httpMethod;
    }

    public function getUri(){
        return $this->uri;
    }

    public function getHeaders(){
        return $this->headers;
    }

    public function getQueryParams(){
        return $this->queryParams;
    }


    public function getPostVars(){
        return $this->postVars;
    }



}