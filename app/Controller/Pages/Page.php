<?php

namespace App\Controller\Pages;
use \App\Utils\View;

class Page
{

    private static function getHeader(){
        return View::render('pages/header');
    }

    private static function getFooter(){
        return View::render('pages/footer');
    }

    public static function getPage($title, $content){
        return View::render('pages/page',[
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter(),    
        ]);
    } 
}