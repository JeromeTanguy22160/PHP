<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

require "User.php";
require "Category.php";

class Post
{
     private ? int $id = null;
     private string $create_at;
     
     public function __construct(
     private string $title,
     private string $excerpt,
     private string $content,
     private User $author,
     private Category $category
    )
    {
        $this -> create_at = date("Y-m-d H:i:s");
    }
    
    public function getId() :? int{
        return $this -> id;
    }
    public function setId($id) : void{
        $this -> id = $id;
    }
    
    public function getTitle() : string{
        return $this -> title;
    }
    public function setTitle($title) : void{
        $this -> title = $title;
    }
    
    public function getExcerpt() : string{
        return $this -> excerpt;
    }
    public function setExcerpt($excerpt) : void{
        $this -> excerpt = $excerpt;
    }
    
    public function getContent() : string{
        return $this -> content;
    }
    public function setContent($content) : void{
        $this -> content = $content;
    }
    
    public function getAuthor() : User{
        return $this -> author;
    }
    public function setAuthor(User $author) : void{
        $this -> author = $author ;
    }
    
    public function getCategory() : Category {
        return $this -> category;
    }
    public function setCategory(Category $category) : void{
        $this -> category = $category ;
    }
    
    public function getCreateAt() : string{
        return $this -> create_at;
    }
    public function setCreateAt($create_at) : void{
        $this -> create_at = $create_at;
    }
    
}