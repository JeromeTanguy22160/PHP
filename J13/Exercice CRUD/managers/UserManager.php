<?php

class UserManager extends AbstractManager {
    
    private array $user = [];
    private array $users = [];
    
    public function __construct(){
        parent :: __construct();
    }
    
    public function getUsers() : array{
        return $this -> users ;
    }
    
    public function setUsers(array $users) :void{
        $this -> users = $users;
    }
    
    public function loadUsers() : void {
        
        $query = $this -> db -> prepare("SELECT * FROM users");
        $query -> execute();
        $this -> users = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function loadUserByID(int $id) : void {
        
        $query = $this -> db -> prepare("SELECT * FROM users WHERE id = :id");
        $parameters = [
        "id" => $id,
        ];
        $query -> execute($parameters);
        $this -> user = $query->fetch(PDO::FETCH_ASSOC);
        
    }
    
    public function createUser(User $user) :void {
        $query = $this -> db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(["email" => $user ->getEmail()]);
        $userExist = $query->fetch(PDO::FETCH_ASSOC);

        if (!$userExist) {
        $query = $this -> db -> prepare("INSERT INTO users(email,first_name,last_name)
        VALUES (:email,:first_name,:last_name)");
        $parameters = [
        "email" => $user -> getEmail(),
        "first_name" => $user -> getFirstName(),
        "last_name"=> $user -> getLastName(),
        ];
        $query -> execute($parameters);
        }
    }
    
    public function updateUser(User $user) : void{
    $query = $this -> db->prepare("UPDATE users SET email = :email, first_name = :first_name, last_name = :last_name WHERE id = :id");
        
        $parameters = [
        "id" => $user ->getId(),
        "email" => $user -> getEmail(),
        "first_name" => $user -> getFirstName(),
        "last_name"=> $user -> getLastname(),
        ];

    $query->execute($parameters);
    }
    
    public function deleteUser(User $user): void{
        $query = $this -> db->prepare("DELETE FROM users WHERE id = :id");

        $parameters = [
        "id" => $user ->getId(),
        ];

    $query->execute($parameters);
    }
}

?>