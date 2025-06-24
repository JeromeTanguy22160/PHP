<?php

class Category {
    
    private ? int $id = null;
    private array $posts = [];
    
    public function __construct(private string $title, private string $description){

    }
    
     public function getId(): ? int 
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
    
    public function getDescription() : string{
        return $this -> description;
    }
    
    public function setDescription (string $description) : void {
        $this -> description = $description;
    }
    
    public function getPosts() : array{
        return $this -> posts;
    }
    
    public function setPosts(array $posts) : void {
        $this -> posts = $posts;
    }
    
     public function addPost(Post $post) : void{
        foreach($this->posts as $postExist){
            if($postExist === $post){
                return ;
            }
        }
        $this -> posts[]= $post;
    }
    
    public function removePost(Post $post) : void{
        foreach($this->posts as $key => $postExist){
            if($postExist === $post){
                unset($this-> posts[$key]);
                return;
            }
        }
       
    }
}

?>