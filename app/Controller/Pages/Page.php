<?php

namespace App\Controller\Pages;
use \App\Utils\View;

class Page{

private static function getHeader(){
    return View::render('pages/header');
}

   public static function getPage($title, $content){
       return View::render('pages/page',[
           'title' => $title,
           'header' => self::getHeader(),
           'content' => $content     
       ]);
   } 
}