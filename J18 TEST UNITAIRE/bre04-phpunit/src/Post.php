<?php

class Post {
    
    public function __construct(
        private string $title,
        private string $content,
        private string $slug,
        private bool $private = false)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setSlug($slug);
    }
    
    private function validateTitle(string $title) : void{
        if(empty(trim($title))) {
            throw new InvalidArgumentException("Le titre ne peut pas être vide.");
        }
    }
    
    private function validateContent(string $content) : void{
        if(empty(trim($content))) {
            throw new InvalidArgumentException("Le contenu ne peut pas être vide.");
        }
    }
    
    private function validateSlug(string $slug): void {
        if(empty(trim($slug))) {
            throw new InvalidArgumentException("Le slug ne peut pas être vide.");
        }
        
        $patern = "/^[a-zA-Z0-9-_]+$/";
        if(!preg_match($patern, $slug)){
            throw new InvalidArgumentException("Le slug ne contient pas que des caractères URL safe.");
        };
    }
    
    public function isPrivate(): bool{
        return $this-> private;
    }
    
    public function getTitle(): string {
        return $this->title;
    }
    public function setTitle($title): void {
        $this->validateTitle($title);
        $this-> title = $title;
    }
    
    public function getContent(): string {
        return $this->content;
    }
    public function setContent($content): void {
        $this->validateContent($content);
        $this-> content = $content;
    }
    
    public function getSlug(): string {
        return $this-> slug;
    }
    public function setSlug($slug): void {
        $this->validateSlug($slug);
        $this-> slug = $slug;
    }
    
    public function getPrivate(): bool {
        return $this-> private;
    }
    public function setPrivate($private): void {
        $this-> private = $private;
    }
}

?>