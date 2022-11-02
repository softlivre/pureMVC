<?php

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
