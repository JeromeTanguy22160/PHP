<?php

class Router
{
    
    private PostController $pm;
    private CategoryController $cm;

    public function __construct()
    {
        $this->pm = new PostController();
        $this->cm = new CategoryController();
    }
    
    public function handleRequest(array $get) : void
    {
        if (isset($get["route"]) && $get["route"] === "category")
        {
         $this -> cm -> list(); 
        }
        else if(isset($get["route"]) && $get["route"] === "post")
        {
         $this-> pm -> list();
        }
        else if (isset($get["route"]) && $get["route"] === 'switch-lang') {
         $this -> pm -> switchLanguage();
        }
        else
        {
         $this -> cm -> list();
        }
    }
}