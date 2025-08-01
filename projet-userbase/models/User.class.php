<?php 

class User {
    private ? int $id = null;
    private string $date;
    
    public function __construct(private string $username,private string $email ,private string $password, private ? string $role = "USER"){
        
        $this->date = date("Y-m-d H:i:s");
    }
    
    public function getId() : ?int{
        return $this -> id ;
    }
    
    public function setId(int $id) :void{
        $this -> id = $id;
    }
    
    public function getUsername() : string{
        return $this -> username ;
    }
    
    public function setUsername(string $username) :void{
        $this -> username = $username;
    }
    
    public function getEmail() : string{
        return $this -> email ;
    }
    
    public function setEmail(string $email) :void{
        $this -> email = $email;
        
    }
    
    public function getPassword() : string{
        return $this -> password ;
    }
    
    public function setPassword(string $password) :void{
        $this -> password = $password;
    }
    
    public function getRole() : string{
        return $this -> role ;
    }
    
    public function setRole(string $role) :void{
        $this -> role = $role;
    }
    
    public function getDate() : string{
        return $this -> date ;
    }
    
    public function setDate(string $date) :void{
        $this -> date = $date;
    }
}

?>