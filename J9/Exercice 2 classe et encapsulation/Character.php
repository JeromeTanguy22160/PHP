<?php

class Character{
    
    private string $firstname= "Jane";
    private string $lastname= "Doe";
    
    public function __construct( private int $id,){
        
    }
    public function getId() :int { 
       return $this ->id;
    }
    public function setId(int $id) :void { 
        $this -> id = $id;
    }
    public function getFirstname() :string { 
       return $this ->firstname;
    }
    public function setFirstname(string $firstname) :void { 
        $this -> firstname = $firstname;
    }
    public function getLastname() :string { 
       return $this ->lastname;
    }
    public function setLastname(string $lastname) :void { 
        $this -> lastname = $lastname;
    }
    
    public function getFullname() :string{
        return $this->firstname . " " . $this ->lastname;
    }
}

?>