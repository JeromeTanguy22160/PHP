<?php

class UserController{
        
    public function list() : void {
        $route = "list";
        
        $userManagerList = new UserManager();
        $users = $userManagerList -> loadUsers();
        var_dump($users);
        
        require "templates/layout.phtml";
    }
    
    public function show() : void {
        $route = "show_user";
        require "templates/layout.phtml";
    }
    
    public function create() : void {
        $route = "create_user";
        require "templates/layout.phtml";
    }
    
    public function checkCreate() : void {
        $route = "check_create_user";
        
        $email = $_POST["email"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        
        $userCreated = new User($email,$first_name,$last_name);
        $userManagerCreate = new UserManager();
        $userManagerCreate -> createUser($userCreated);
        
        $route = "list";
        header ("https://jerometanguy.sites.3wa.io/PHP/J13/Exercice%20CRUD/index.php"); 
        
        require "templates/layout.phtml";
    }
    
    public function update() : void {
        $route = "update_user";
        require "templates/layout.phtml";
    }
    
    public function checkUpdate() : void {
        $route = "check_update_user";
        require "templates/layout.phtml";
    }
    
    public function delete() : void {
        $route = "delete_user";
        require "templates/layout.phtml";
    }
}

?>