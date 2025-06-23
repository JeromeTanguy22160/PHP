<?php

class Warrior extends Character {
   
   private int $energy;
   
   public function __construct($life, $name, $energy){
        $this->setLife($life);
        $this->setName($name);
        $this->energy = $energy;
    }
    
    public function getEnergy() :int { 
       return $this ->energy;
    }
    public function setEnergy(int $energy) :void { 
        $this -> energy = $energy;
    }
    public function introduce() :string{
        return "Bonjour je m'appelle " . $this -> name .", j'ai " . $this-> life . " points de vie, et j'ai " . $this -> energy . " d'énergie";
    }
}

?>