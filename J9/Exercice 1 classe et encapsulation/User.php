<?php

class User{
    
    public function __construct( private int $id,private string $username,private string $password){
        
    }
    public function getId() :int { 
       return $this ->id;
    }
    public function setId() :void { 
        $this -> id = $id;
    }
    public function getUsername() :string { 
       return $this ->username;
    }
    public function setUsername() :void { 
        $this -> username = $username;
    }
    public function getPassword() :string { 
       return $this ->password;
    }
    public function serPassword() :void { 
        $this -> password = $password;
    }
}

?>