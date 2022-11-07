<?php

// read .env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load(true);

define('URL', $_ENV['URL']);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
define('DB_PORT', $_ENV['DB_PORT']);