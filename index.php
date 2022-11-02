<?php
session_start();

// folowing the tutorial on https://www.youtube.com/watch?v=TmeyoTNu748
// MVC em PHP: Conceito e início do projeto - Série MVC em PHP - Parte 1
// https://www.youtube.com/playlist?list=PL_zkXQGHYosGQwNkMMdhRZgm4GjspTnXs

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/resources/enviroment.php';
require __DIR__.'/resources/debuglevel.php';

use \App\Http\Router;
use \App\Utils\View;

// sets the default variables values
View::init([
    'URL' => URL
]);

// start the router
$obRouter = new Router (URL);

// include pages routes
include __DIR__.'/routes/pages.php';

// print route response
$obRouter->run()->sendResponse();
