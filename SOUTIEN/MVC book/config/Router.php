<?php

class Router{
    private BookController $controller;

    public function __construct()
    {
        $this->controller = new BookController();
    }

    public function handleRequest(array $get) : void
    {
        if(isset($get['route']))
        {
            if($get['route']=="add-book")
            {
                $this->controller->create();
            }
            else if($get['route']=="check-add-book")
            {
                $this->controller->checkCreate();
            }
            else
            {
                $this->controller->notFound();
            }
        }
        else
        {
            $this->controller->list();
        }
    }
}