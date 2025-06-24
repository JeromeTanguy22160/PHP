<?php
require "../models/User.php";
require "AbstractManager.php";

class UserManager extends AbstractManager {
    public function __construct()
    {
         parent::__construct();
    }
    
    public function findAll() : array
    { 
        $query = $this -> db -> prepare("SELECT * FROM users");
        $query -> execute();
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
        $users = [];
        
        foreach ($result as $userData) {
            $user = new User(
                $userData['username'],
                $userData['email'],
                $userData['password'],
                $userData['role']
            );
            $user->setId((int)$userData['id']);
            $user->setCreateAt($userData['createAt']);

            $users[] = $user;
        }

        return $users;
    }
    
    public function findOne(int $id) :? User
    {
        $query = $this -> db -> prepare("SELECT * FROM users WHERE users.id = :id");
        $parameters = [
            "id" => $id
    ];
        $query -> execute($parameters);
        $userExist = $query->fetch(PDO::FETCH_ASSOC);
        if ($userExist) {
            $user = new User(
                $userExist['username'],
                $userExist['email'],
                $userExist['password'],
                $userExist['role']
            );
            $user->setId((int)$userExist['id']);
            $user->setCreateAt($userExist['createAt']);

            return $user;
        }
        return null;
    }
    
    public function create()
    {
        return;
    }
    
    public function update()
    {
        ;
    }
    
    public function delete()
    {
        ;
    }
}

?>