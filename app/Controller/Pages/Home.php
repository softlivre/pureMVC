<?php

namespace App\Controller\Pages;
use \App\Utils\View;

class Home{
   public static function getHome(){
       return View::render('pages/home',[
           'name' => 'Home',
           'description' => 'Home page'
       ]);
   } 
}