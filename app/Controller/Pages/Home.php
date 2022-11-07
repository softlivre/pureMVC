<?php

// controller
// this controls the requisitions made to our site home
// receives an action (for example a query)
// executes the model to obtain required data
// and then provide this data to the view, to be rendered

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page
{

    /**
     * this method returns contents (view) of our home 
     */

    public static function getHome()
    {

        $obOrganization = new Organization;

        // home view
        $content = View::render('pages/home', [
            'name' => $obOrganization->name            
        ]);

        return parent::getPage('Home '.APP_NAME, $content);
    }
}
