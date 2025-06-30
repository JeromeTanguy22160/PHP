<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class User
{
    private ? int $id = null;
    private string $create_at;
    
    public function __construct(private string $username, private string $email,
    private string $password, private ? string $role = "USER")
    {
        $this -> create_at = date("Y-m-d H:i:s");
    }
    
    public function getId() :? int{
        return $this -> id;
    }
    public function setId($id) : void{
        $this -> id = $id;
    }
    
    public function getUsername() : string{
        return $this -> username;
    }
    public function setUsername($username) : void{
        $this -> username = $username;
    }
    
    public function getEmail() : string{
        return $this -> email;
    }
    public function setEmail($email) : void{
        $this -> email = $email;
    }
    
    public function getPassword() : string{
        return $this -> password;
    }
    public function setPassword($password) : void{
        $this -> password = $password;
    }
    
    public function getRole() : string{
        return $this -> role;
    }
    public function setRole($role) : void{
        $this -> role = $role;
    }
    
    public function getCreateAt() : string{
        return $this -> create_at;
    }
    public function setCreateAt($create_at) : void{
        $this -> create_at = $create_at;
    }
}