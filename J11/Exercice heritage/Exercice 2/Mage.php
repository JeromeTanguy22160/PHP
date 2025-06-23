<?php

class Mage extends Character {
   
   private int $mana;
   
   public function __construct($life, $name, $mana){
        $this->setLife($life);
        $this->setName($name);
        $this->mana = $mana;
    }
    
    public function getMana() :int { 
       return $this ->mana;
    }
    public function setMana(int $mana) :void { 
        $this -> mana = $mana;
    }
    public function introduce() :string{
        return "Bonjour je m'appelle " . $this -> name .", j'ai " . $this-> life . " points de vie, et j'ai " . $this -> mana . " de mana";
    }
}

?>