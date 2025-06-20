<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/../models/User.class.php';

class Usermanager {
    
    private array $users = [];
    private PDO $db ;
    
    public function __construct(){
        
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();


        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_NAME'];
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        $user = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        $this -> db = new PDO(
            $connexionString,
            $user,
            $password
        );
    }
    
    public function getUsers() : array{
        return $this -> users ;
    }
    
    public function setUsers(array $users) :void{
        $this -> users = $users;
    }
    
    public function loadUsers(){
        
        $query = $this -> db -> prepare("SELECT * FROM users");
        $query -> execute();
        $this -> users = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function saveUser(User $user){
        $query = $this -> db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(["email" => $user ->getEmail()]);
        $userExist = $query->fetch(PDO::FETCH_ASSOC);

        if (!$userExist) {
        $query = $this -> db -> prepare("INSERT INTO users(username,email,password,role,created_at)
        VALUES (:username,:email,:password,:role,:created_at)");
        $parameters = [
        "username" => $user -> getUsername(),
        "email" => $user -> getEmail(),
        "password" => $user -> getPassword(),
        "role"=> $user -> getRole(),
        "created_at" => $user-> getDate()
        ];
        $query -> execute($parameters);
        }
    }
    
    public function deleteUser(User $user){
        $query = $this -> db->prepare("DELETE FROM users WHERE id = :id");

        $parameters = [
        "id" => $user ->getId(),
        ];

    $query->execute($parameters);
    }
    
};
?>