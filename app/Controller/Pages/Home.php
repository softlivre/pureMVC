<?php

namespace App\Controller\Pages;
use \App\Utils\View;

class Home extends Page{
   public static function getHome(){
       $content = View::render('pages/home',[
           'name' => 'Home',
           'description' => 'Home page',
           'site' => 'http://www.google.com'
       ]);

       return parent::getPage('Home 111', $content);

   } 
}