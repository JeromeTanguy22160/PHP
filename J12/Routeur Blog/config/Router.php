<?php

class Router{
    
    public function __construct()
    {
        
    }
    
    public function handleRequest(array $get) : void {
    
        if (!isset($get["route"])){
            $pageControlleurHome = new PageController;
            $pageControlleurHome -> home();
        }
        
        else if ($get["route"] === "contact"){
            $pageControlleurContact = new PageController;
            $pageControlleurContact -> contact();
        }
        
        else if ($get["route"] === "a-propos"){
            $pageControlleurAbout = new PageController;
            $pageControlleurAbout -> about();
        }
        
        else if ($get["route"] === "categorie" && $get["categorie"] === "dev-back"){
            $pageControlleurDevBack = new PageController;
            $pageControlleurDevBack -> devBack();
        }
        
        else if ($get["route"] === "categorie" && $get["categorie"] === "dev-front"){
            $pageControlleurDevFront = new PageController;
            $pageControlleurDevFront -> devFront();
        }
        
        elseif ($get["route"] === "article" && $get["article"] === "i-love-php"){
            $pageControlleurILovePHP = new PageController;
            $pageControlleurILovePHP -> iLovePHP();
        }
        
        elseif ($get["route"] === "article" && $get["article"] === "i-love-js"){
            $pageControlleurILoveJS = new PageController;
            $pageControlleurILoveJS -> iLoveJS();
        }
        
        else {
            $pageControlleurNotFound = new PageController;
            $pageControlleurNotFound -> notFound();
        }
    }
}
    
?>