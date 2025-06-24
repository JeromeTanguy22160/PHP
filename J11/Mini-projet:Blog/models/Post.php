<?php

class Post {
    
    private ? int $id = null;
    private array $categories = [];
    private string $createAt;
    
    public function __construct(private string $title, private string $excerpt, private string $content, private int $author){
        $this -> createAt = date("Y-m-d H:i:s");
    }
    
    public function getId():? int 
    { 
        return $this->id;
    }
    
    public function setId(int $id): void 
    { 
        $this->id = $id;
    }
    
    public function getTitle() : string{
        return $this -> title;
    }
    
    public function setTitle(string $title) : void {
        $this -> title = $title;
    }
    
    public function getExcerpt() : string{
        return $this -> excerpt;
    }
    
    public function setExcerpt(string $excerpt) : void {
        $this -> excerpt = $excerpt;
    }
    
    public function getContent() : string{
        return $this -> content;
    }
    
    public function setContent(string $content) : void {
        $this -> content = $content;
    }
    
    public function getAuthor() : int {
        return $this -> author;
    }
    
    public function setAuthor(int $author) : void {
        $this -> author = $author;
    }
    
    public function getCreateAt() : string{
        return $this -> createAt;
    }
    
    public function setCreateAt(string $createAt) : void {
        $this -> createAt = $createAt;
    }
    
    public function getCategories() : array{
        return $this -> categories;
    }
    
    public function setCategories(array $categories) : void {
        $this -> categories = $categories;
    }
    
    public function addCategory(Category $category) : void{
        foreach($this->categories as $categoryExist){
            if($categoryExist === $category){
                return ;
            }
        }
        $this -> categories[]= $category;
    }
    
    public function removeCategory(Category $category) : void{
        foreach($this->categories as $key => $categoryExist){
            if($categoryExist === $category){
                unset($this-> categories[$key]);
                return;
            }
        }
       
    }
}

?>