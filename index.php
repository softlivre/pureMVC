<?php

//show errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/vendor/autoload.php';

use \App\Controller\Pages\Home;

echo Home::getHome();