<?php 

class User {
    private ? int $id = null;
    
    public function __construct(private string $firstname,private string $lastname,private string $email){
        
    }
    
    public function getId() : int{
        return $this -> id ;
    }
    
    public function setId(int $id) :void{
        $this -> id = $id;
    }
    
    public function getFirstname() : string{
        return $this -> firstname ;
    }
    
    public function setFirstname(string $firstname) :void{
        $this -> firstname = $firstname;
    }
    
    public function getLastname() : string{
        return $this -> lastname ;
    }
    
    public function setLastname(string $lastname) :void{
        $this -> lastname = $lastname;
    }
    
    public function getEmail() : string{
        return $this -> email ;
    }
    
    public function setEmail(string $email) :void{
        $this -> email = $email;
    }
}

?>