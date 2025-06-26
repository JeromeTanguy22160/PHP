<?php

class UserManager extends AbstractManager {
    
    public function __construct(){
        parent :: __construct();
    }
    
    public function loadUsers() : array {
        
        $query = $this -> db -> prepare("SELECT * FROM users");
        $query -> execute();
        $usersData = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $users = [];
        
        foreach ($usersData as $userData){
            $user = new User($userData["email"],$userData["first_name"],$userData["last_name"]);
            $user -> setId($userData["id"]);
            $users[] = $user;
        }
        return $users;
    }
    
    public function loadUserById(int $id) : ?User {
        
        $query = $this -> db -> prepare("SELECT * FROM users WHERE id = :id");
        $parameters = [
        "id" => $id,
        ];
        $query -> execute($parameters);
        $userData = $query->fetch(PDO::FETCH_ASSOC);
        
        if($userData){
            $user = new User($userData["email"],$userData["first_name"],$userData["last_name"]);
            $user -> setId($userData["id"]);
            return $user;
        }
        return null ;
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
    
    public function deleteUser(User $user) : void{
        $query = $this -> db->prepare("DELETE FROM users WHERE id = :id");

        $parameters = [
        "id" => $user ->getId(),
        ];

    $query->execute($parameters);
    }
}

?>