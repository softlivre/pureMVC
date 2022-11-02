<?php

// read .env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load(true);

define('URL', $_ENV['APP_BASEURL']);