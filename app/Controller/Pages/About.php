<?php

// controller
// this controls the requisitions made to our site home
// receives an action (for example a query)
// executes the model to obtain required data
// and then provide this data to the view, to be rendered

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class About extends Page
{

    /**
     * this method returns contents (view) of our page 
     */

    public static function getAbout()
    {

        $obOrganization = new Organization;

        // home view
        $content = View::render('pages/about', [
            'name' => $obOrganization->name,
            'description' => $obOrganization->description,
            'site' => $obOrganization->site
        ]);

        return parent::getPage('About', $content);
    }
}
