<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase{
    
    public function testEmptyFirstName(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Le prénom ne peut pas être vide.");
        new User("", "lastName", "email@bipbip.fr", "Password12@",["ANONYMOUS"]);
    }
    
    public function testEmptyLastName(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Le nom ne peut pas être vide.");
        new User("firstName", "", "email@bipbip.fr", "Password12@",["ANONYMOUS"]);
    }
    
    public function testEmptyEmail(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("L'email n'est pas valable.");
        new User("firstName", "lastName", "", "Password12@",["ANONYMOUS"]);
    }
    
    public function testEmptyPassword(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Le mot de passe doit contenir au minimum une majuscule, un mot de passe ,et un caractère spécial.");
        new User("firstName", "lastName", "email@bipbip.fr", "",["ANONYMOUS"]);
    }
    
    public function testEmptyRoles(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Les roles ne peuvent pas être vide.");
        new User("firstName", "lastName", "email@bipbip.fr", "Password12@", []);
    }
    
    public function testSettersAndGetters(): void {
        $user = new User("firstName","lastName","email@bipbip.fr","Password12@",["ANONYMOUS"]);
        
        $user -> setFirstName("New firstName");
        $user -> setLastName("New lastName");
        $user -> setEmail("email@bipbiop.fr");
        $user -> setPassword("Password124@");
        $user -> setRoles(["ADMIN"]);
        
        $this->assertSame("New firstName", $user -> getFirstName());
        $this->assertSame("New lastName", $user-> getLastName());
        $this->assertSame("email@bipbiop.fr", $user -> getEmail());
        $this->assertSame("Password124@", $user -> getPassword());
        $this->assertSame(["ADMIN"], $user -> getRoles());
    }
}

?>