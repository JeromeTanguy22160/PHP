<?php

class Book {
    
    private ? int $id = null;
    private string $title;
    private string $author;
    private string $description;
    
    public function getID() : ? int { 
        return $this -> id;
    }
    public function setID(int $id) : void { 
        $this -> id = $id;
    }
    
    public function getTitle() : string { 
        return $this -> title;
    }
    public function setTitle(string $title) : void { 
        $this -> title = $title;
    }
    
    public function getAuthor() : string { 
        return $this -> author;
    }
    public function setAuthor(string $author) : void { 
        $this -> author = $author;
    }
    
    public function getDescription() : string { 
        return $this -> description;
    }
    public function setDescription(string $description) : void { 
        $this -> description = $description;
    }
}