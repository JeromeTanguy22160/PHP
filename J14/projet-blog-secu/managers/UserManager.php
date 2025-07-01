<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class UserManager extends AbstractManager
{
    public function __construct(){
        parent :: __construct();
    }
    
    public function findByEmail(string $email) : ?User {
            
        $query = $this -> db -> prepare ("SELECT * FROM users 
        WHERE users.email = :email");
        $parameters = [
            'email' => $email
            ];
        $query -> execute($parameters);
        $userData = $query->fetch(PDO::FETCH_ASSOC);
         if($userData){
            $user = new User($userData["username"], $userData["email"], $userData["password"], $userData["role"]);
            $user -> setId($userData["id"]);
            $user -> setCreatedAt($userData["created_at"]);
            return $user;
        }
        return null;
    }
    
    public function findOne(int $id) :?User {
        
        $query = $this -> db -> prepare("SELECT * FROM users WHERE id = :id");
        $parameters = [
        "id" => $id,
        ];
        $query -> execute($parameters);
        $userData = $query->fetch(PDO::FETCH_ASSOC);
        
        if($userData){
            $user = new User($userData["username"], $userData["email"], $userData["password"], $userData["role"]);
            $user -> setId($userData["id"]);
            $user -> setCreatedAt($userData["created_at"]);
            return $user;
        }
        return null;
    }
    
    public function create(User $user) :void {
        $query = $this -> db -> prepare("SELECT * FROM users WHERE email = :email
        AND username = :username");
        $parameters = [
        "email" => $user -> getEmail(),
        "username" => $user -> getUsername()
        ];
        $query -> execute($parameters);
        $userExist = $query -> fetch(PDO::FETCH_ASSOC);
        
        if (!$userExist){
          $query = $this -> db -> prepare("INSERT INTO users(username, email, password, role) 
          VALUES(:username, :email, :password, :role)");
          $parameters = [
              "username" => $user -> getUsername(),
              "email" => $user -> getEmail(),
              "password" => $user->getPassword(),
              "role" => $user -> getRole() 
              ]; 
          $query -> execute($parameters);
        }
    }
}