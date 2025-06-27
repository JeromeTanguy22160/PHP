<?php

class BookManager extends AbstractManager {

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll() : array {
        
    $query = $this -> db ->prepare("SELECT * FROM books");
    $query -> execute();
    $booksData = $query -> fetchAll(PDO::FETCH_ASSOC);
    $books = [];
    
    foreach ($booksData as $bookData){
        $book = new Book();
        $book -> setId($bookData["id"]);
        $book -> setTitle($bookData["title"]);
        $book -> setAuthor($bookData["author"]);
        $book -> setDescription($bookData["description"]);
        $books[] = $book;
        
    }
        return $books;
    }

    public function create(Book $book) : void {
    
    $query = $this -> db -> prepare("SELECT * FROM books WHERE title = :title");
    $parameters = [
        "title" => $book ->getTitle()
        ];
    $query -> execute($parameters);
    $bookExist = $query -> fetch(PDO::FETCH_ASSOC);
    
        if (!$bookExist){
          $query = $this -> db -> prepare("INSERT INTO books(title, author, description) 
          VALUES(:title,:author,:description)");
          $parameters = [
              "title" => $book -> getTitle(),
              "author" => $book -> getAuthor(), 
              "description" =>$book -> getDescription()
              ];
          $query -> execute($parameters);
        }
    }
}