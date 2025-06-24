<?php

class Router {
    
    public function __construct()
    {
        
    }
    
    public function handleRequest(array $get) : void {
        if (!isset($get["route"]))
        {
            $pageControlleurHome= new PageController();
            $pageControlleurHome -> home();
            
        }
        elseif($get["route"] === "a-propos")
        {
            $pageControlleurAbout = new PageController();
            $pageControlleurAbout -> about();
        }
        elseif($get["route"] === "contact")
        {
            $pageControlleurAbout = new PageController();
            $pageControlleurAbout -> contact();
        }
        else
        {
        $pageControlleurNotFound = new PageController();
        $pageControlleurNotFound -> notFound(); 
        }
    }
}

?>