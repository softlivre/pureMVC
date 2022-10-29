<?php
session_start();

// folowing the tutorial on https://www.youtube.com/watch?v=TmeyoTNu748
// MVC em PHP: Conceito e início do projeto - Série MVC em PHP - Parte 1
// https://www.youtube.com/playlist?list=PL_zkXQGHYosGQwNkMMdhRZgm4GjspTnXs

require __DIR__.'/vendor/autoload.php';
use \App\Controller\Pages\Home;

// read .env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load(true);

$app_debug = (strcasecmp($_ENV['APP_DEBUG'], 'true') ? false : true);

if($app_debug){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
else{
    error_reporting(0);
    ini_set('display_errors', 0);
}

echo Home::getHome();
