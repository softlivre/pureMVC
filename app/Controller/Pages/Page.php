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

    public static function getPagination($request, $obPagination){        
        
        $pages = $obPagination->getPages();

        if(count($pages) <= 1) return '';

        $links = '';

        $url = $request->getRouter()->getCurrentUrl();
        
        $queryParams = $request->getQueryParams();

        foreach($pages as $page){
            $queryParams['page'] = $page['page'];
            
            $link = $url.'?'.http_build_query($queryParams);

            // render view
            $links .= View::render('pages/pagination/link', [
                'page' => $page['page'],
                'link' => $link,
                'active' => $page['current'] ? 'active' : ''
            ]);
        }

        // render pagination box
        return View::render('pages/pagination/box', [            
            'links' => $links
        ]);

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