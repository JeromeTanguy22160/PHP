<?php

class CategoryController {
        
    public function list() : void {
        $route = "categories";
        
        $cm = new CategoryManager();
        $categories = $cm -> loadCategories();
        
        require "templates/categories.phtml";
    }
    
}