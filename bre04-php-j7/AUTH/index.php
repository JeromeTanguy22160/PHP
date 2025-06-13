<?php

session_start();

require "connexion.php";

function routing() : string {
    if (isset($_GET["page"])) {
        return $_GET["page"];
    }
    else{
        return "home";
    }
}

$route = routing();

require "layout.phtml";
?>