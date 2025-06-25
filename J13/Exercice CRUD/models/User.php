<?php

class User {
    private ? int $id = null;
    
    public function __construct(private string $email, private string $first_name, private string $last_name)
    {
        
    }
    
     public function getId():? int 
    { 
        return $this->id;
    }
    
    public function setId(int $id): void
    { 
        $this->id = $id;
    }
    
    public function getEmail() : string
    {
        return $this -> email;
    }
    
    public function setEmail(string $email) : string
    {
        $this -> email = $email; 
    }
    
    public function getFirst_name() : string
    {
        return $this -> first_name;
    }
    
    public function setFirst_name(string $first_name) : string
    {
        $this -> first_name = $first_name; 
    }
    
    public function getLast_name() : string
    {
        return $this -> last_name;
    }
    
    public function setLast_name(string $last_name) : string
    {
        $this -> last_name = $last_name; 
    }
}

?>