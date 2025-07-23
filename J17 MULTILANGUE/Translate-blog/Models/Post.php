<?php

class Post
{
    private ?int $id = null;
    private Category $category;
    
    public function __construct(private string $title_en,private string $excerpt_en,private string $title_fr,private string $excerpt_fr)
    {
        
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    public function getTitleEn(): string
    {
        return $this->title_en;
    }
    
    public function getExcerptEn(): string
    {
        return $this->excerpt_en;
    }
    
    public function getTitleFr(): string
    {
        return $this->title_fr;
    }
    
    public function getExcerptFr(): string
    {
        return $this->excerpt_fr;
    }
    
    public function getCategory(): Category
    {
        return $this->category;
    }
    
    public function setCategory(Category $category): void
    {
        $this-> category = $category;
    }
}