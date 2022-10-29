<?php

namespace App\Utils;

class View{
    private static function getContentView($view){
        //retorna o conteudo exato da view
       $file = __DIR__.'/../../resources/view/'.$view.'.html';       
        if(file_exists($file)){
            return file_get_contents($file);
        }else{
           return '<h1>View not found</h1>';
        }
    }

   /**
    * metodo responsavel por retornar conteudo renderizado da view
    * @param string $view
    * @param array $vars (string/numeric)
    * @return string
    */    
    public static function render($view, $vars = []){
        
        // view contents
        $contentView = self::getContentView($view);
        
        // keys from array
        $keys = array_keys($vars);
        
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        },$keys);
        
        // returns rendered content
        return str_replace($keys, array_values($vars), $contentView);   
    }
    
}