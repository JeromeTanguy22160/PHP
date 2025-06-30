<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

class Post
{
     private ? int $id = null;
     private string $created_at;
     private array $categories = [];
     
     public function __construct(
     private string $title,
     private string $excerpt,
     private string $content,
     private User $author
    )
    {
        $this -> created_at = date("Y-m-d H:i:s");
    }
    
    public function getId() :? int{
        return $this -> id;
    }
    public function setId(int $id) : void{
        $this -> id = $id;
    }
    
    public function getTitle() : string{
        return $this -> title;
    }
    public function setTitle(string $title) : void{
        $this -> title = $title;
    }
    
    public function getExcerpt() : string{
        return $this -> excerpt;
    }
    public function setExcerpt(string $excerpt) : void{
        $this -> excerpt = $excerpt;
    }
    
    public function getContent() : string{
        return $this -> content;
    }
    public function setContent(string $content) : void{
        $this -> content = $content;
    }
    
    public function getAuthor() : User{
        return $this -> author;
    }
    public function setAuthor(User $author) : void{
        $this -> author = $author ;
    }
    
    public function getCategories() : array {
        return $this -> categories;
    }
    public function setCategories(Category $category) : void{
        $this -> categories[] = $category ;
    }
    
    public function getCreatedAt() : string{
        return $this -> create_at;
    }
    public function setCreatedAt(string $create_at) : void{
        $this -> create_at = $create_at;
    }
    
}