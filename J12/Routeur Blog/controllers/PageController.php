<?php

class PageController{
        
    public function home() : void {
        $route = "home";
        require "templates/layout.phtml";
    }
    
    public function contact() : void {
        $route = "contact";
        require "templates/layout.phtml";
    }
    
    public function about() : void {
        $route = "about";
        require "templates/layout.phtml";
    }
    
    public function notFound() : void {
        $route = "notFound";
        require "templates/layout.phtml";
    }
    
    public function devBack() : void {
        $route = "categorie";
        $categorie = "dev-back";
        require "templates/layout.phtml";
    }
    
    public function devFront() : void {
        $route = "categorie";
        $categorie = "dev-front";
        require "templates/layout.phtml";
    }
    
    public function IlovePHP() : void {
        $route = "article";
        $categorie = "i-love-php";
        require "templates/layout.phtml";
    }
    
    public function IloveJS() : void {
        $route = "article";
        $categorie = "i-love-js";
        require "templates/layout.phtml";
    }
}

?>