<?php

class PostController {
        
    public function list() : void {
        $route = "posts";
        
        $pm = new PostManager();
        $posts = $pm -> loadPosts();
        
        require "templates/posts.phtml";
    }
    
    public function switchLanguage(): void
    {
        if ($_SESSION['lang'] === 'fr')
        {
            $_SESSION['lang'] = 'en';
        } else {
            $_SESSION['lang'] = 'fr';
        }
        
        $redirectTo = $_SERVER['HTTP_REFERER'] ?? 'index.php';
        
        header('Location: ' . $redirectTo);
        exit();
    }
}