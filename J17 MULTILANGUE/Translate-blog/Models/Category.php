<?php

class Category
{
    private ?int $id;
    
    public function __construct(private string $title_en,private string $description_en,private string $title_fr,private string $description_fr)
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
    
    public function getDescriptionEn(): string
    {
        return $this->description_en;
    }
    public function getTitleFr(): string
    {
        return $this->title_fr;
    }
    
    public function getDescriptionFr(): string
    {
        return $this->description_fr;
    }
}

?> 