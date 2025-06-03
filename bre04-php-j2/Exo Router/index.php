<?php



function routing() : string {
    
    $route = $_GET['page'] ?? 'homepage' ;
    
    if ( $route === "about" ){
        return "about";
    }
    else if ( $route === "contact"){
        return "contact";
    }
    else{
        return "homepage";
    }
}

$template = routing();

require "templates/layout.phtml";

?>