<?php

class BookController {
    private BookManager $manager;

    public function __construct() {
        $this->manager = new BookManager();
    }

    public function list() : void
    {
        $template = "books/list-book";
        
        $bookManagerList = new BookManager();
        $books = $bookManagerList -> findAll();
        
        require "templates/layout.phtml";
    }

    public function create() : void {
        $template = "books/add-book";
        require "templates/layout.phtml";
    }

    public function checkCreate() : void
    {
        $title = $_POST["title"];
        $author = $_POST["author"];
        $description = $_POST["description"];
        
        $bookCreate = new Book();
        $bookCreate -> setTitle($title);
        $bookCreate -> setAuthor($author);
        $bookCreate -> setDescription($description);
        
        $bookManagerCreate = new BookManager();
        $bookManagerCreate -> create($bookCreate);
        
        $template = "books/list-book";
        header('Location: index.php');
        
        $bookManagerCreate -> findAll();
    }

    public function notFound() : void
    {
        $template = "not-found";
        require "templates/layout.phtml";
    }
}