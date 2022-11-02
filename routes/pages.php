<?php

use \App\Http\Response;
use \App\Controller\Pages;

// HOME route
$obRouter->get('/',[
    function(){
        return new Response(200,Pages\Home::getHome());
    }
]);

// ABOUT route
$obRouter->get('/sobre',[
    function(){
        return new Response(200,Pages\About::getAbout());
    }
]);

// Dynamic route
$obRouter->get('/pagina/{idPagina}/{acao}',[
    function($idPagina, $acao){
        return new Response(200,'Pagina '. $idPagina . ' - acao: ' . $acao);
    }
]);

