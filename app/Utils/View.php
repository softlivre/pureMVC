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
   
    public static function render($view){
        //metodo responsavel por retornar conteudo renderizado da view
        $contentView = self::getContentView($view);
        return $contentView;    
    }
    
}