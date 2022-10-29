<?php

// receives content from header and footer

namespace App\Controller\Pages;
use \App\Utils\View;

class Page
{
    /**
     * Method responsible of rendering the header of our generic page
     * @return string
     */
    private static function getHeader(){
        return View::render('pages/header');
    }

    /**
     * Method responsible of rendering the footer of our generic page
     * @return string
     */
    private static function getFooter(){
        return View::render('pages/footer');
    }

    /**
     * Method responsible of rendering the content (view) of our generic page
     * @return string
     */
    public static function getPage($title, $content){
        return View::render('pages/page',[
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter(),    
        ]);
    } 
}