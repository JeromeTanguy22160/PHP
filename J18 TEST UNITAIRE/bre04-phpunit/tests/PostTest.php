<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PostTest extends TestCase{
    
    public function testEmptyTitle(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Le titre ne peut pas être vide.");
        new Post("", "Content", "slug");
    }
    
    public function testEmptyContent(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Le contenu ne peut pas être vide.");
        new Post("title", "", "slug");
    }
    
    public function testEmptySlug(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Le slug ne peut pas être vide.");
        new Post("title", "Content", "");
    }
    
    public function testSlugNotSafe(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Le slug ne contient pas que des caractères URL safe.");
        new Post("Titre", "Contenu", "slug invalide!");
    }
    
    public function testSettersAndGetters(): void {
        $post = new Post("Title","Content","Slug");
        
        $post -> setTitle("New title");
        $post -> setContent("New Content");
        $post -> setSlug("New-slug");
        $post -> setPrivate(true);
        
        $this->assertSame("New title", $post -> getTitle());
        $this->assertSame("New Content", $post -> getContent());
        $this->assertSame("New-slug", $post -> getSlug());
        $this->assertTrue($post->getPrivate());
    }
}

?>