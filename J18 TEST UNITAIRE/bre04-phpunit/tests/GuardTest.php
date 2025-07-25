<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GuardTest extends TestCase
{
    private function createPublicPost(): Post
    {
        return new Post("Titre Public", "Contenu...", "slug-public", false);
    }
    
    private function createPrivatePost(): Post
    {
        return new Post("Titre Privé", "Contenu...", "slug-prive", true);
    }
    
    private function createAnonymousUser(): User
    {
        return new User("firstName", "lastName", "email@bipbip.fr", "Password12@");
    }
    
    private function createUser(): User
    {
        $user = $this->createAnonymousUser();
        $user->setRoles(['USER']);
        return $user;
    }
    
    private function createAdmin(): User
    {
        $user = $this->createAnonymousUser();
        $user->setRoles(['ADMIN']);
        return $user;
    }
    
    public function testGiveAccessToPrivatePostAsAnonymousThrowsException(): void
    {
        $this->expectException(LogicException::class);
        Guard::giveAccess($this->createPrivatePost(), $this->createAnonymousUser());
    }
    
    
    public function testGiveAccessToPrivatePostAsUserMakesAdmin(): void
    {
        $user = Guard::giveAccess($this->createPrivatePost(), $this->createUser());
        $this->assertContains('ADMIN', $user->getRoles());
    }
    
    public function testGiveAccessToPrivatePostAsAdminDoesNothing(): void
    {
        $admin = $this->createAdmin();
        $user = Guard::giveAccess($this->createPrivatePost(), $admin);
        $this->assertSame(['ADMIN'], $user->getRoles());
    }
    
    public function testGiveAccessToPublicPostAsAnonymousMakesUser(): void
    {
        $user = Guard::giveAccess($this->createPublicPost(), $this->createAnonymousUser());
        $this->assertSame(['USER'], $user->getRoles());
    }
    
    public function testGiveAccessToPublicPostAsUserOrAdminDoesNothing(): void
    {
        $user = $this->createUser();
        $admin = $this->createAdmin();
        
        $updatedUser = Guard::giveAccess($this->createPublicPost(), $user);
        $this->assertSame(['USER'], $updatedUser->getRoles());
        
        $updatedAdmin = Guard::giveAccess($this->createPublicPost(), $admin);
        $this->assertSame(['ADMIN'], $updatedAdmin->getRoles());
    }
    
    public function testRemoveAccessFromPrivatePostAsAdminMakesUser(): void
    {
        $user = Guard::removeAccess($this->createPrivatePost(), $this->createAdmin());
        $this->assertSame(['USER'], $user->getRoles());
    }
    
    public function testRemoveAccessFromPrivatePostAsUserMakesAnonymous(): void
    {
        $user = Guard::removeAccess($this->createPrivatePost(), $this->createUser());
        $this->assertSame(['ANONYMOUS'], $user->getRoles());
    }

    public function testRemoveAccessFromPrivatePostAsAnonymousDoesNothing(): void
    {
        $anon = $this->createAnonymousUser();
        $user = Guard::removeAccess($this->createPrivatePost(), $anon);
        $this->assertSame(['ANONYMOUS'], $user->getRoles());
    }

    public function testRemoveAccessFromPublicPostAsAdminMakesUser(): void
    {
        $user = Guard::removeAccess($this->createPublicPost(), $this->createAdmin());
        $this->assertSame(['USER'], $user->getRoles());
    }

    public function testRemoveAccessFromPublicPostAsUserMakesAnonymous(): void
    {
        $user = Guard::removeAccess($this->createPublicPost(), $this->createUser());
        $this->assertSame(['ANONYMOUS'], $user->getRoles());
    }

    public function testRemoveAccessFromPublicPostAsAnonymousDoesNothing(): void
    {
        $anon = $this->createAnonymousUser();
        $user = Guard::removeAccess($this->createPublicPost(), $anon);
        $this->assertSame(['ANONYMOUS'], $user->getRoles());
    }
}

?>