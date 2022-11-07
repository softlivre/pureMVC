<?php
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../resources/enviroment.php';
require __DIR__.'/../resources/debuglevel.php';

use \App\Utils\View;
use \Softlivre\DatabaseManager\Database;

// define DB config
Database::config(
    DB_HOST,
    DB_NAME,
    DB_USER,
    DB_PASS,
    DB_PORT
);

// sets the default variables values
View::init([
    'URL' => URL
]);
