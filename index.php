<?php
session_start();

require __DIR__.'/includes/app.php';

use \App\Http\Router;

// start the router
$obRouter = new Router (URL);

// include pages routes
include __DIR__.'/routes/pages.php';

// print route response
$obRouter->run()->sendResponse();
