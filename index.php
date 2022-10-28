<?php

//show errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

// read .env variables


require __DIR__.'/vendor/autoload.php';

use \App\Controller\Pages\Home;

echo Home::getHome();




