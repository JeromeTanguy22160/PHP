<?php

require "Character.php";
require "Warrior.php";
require "Mage.php";

$png = new Character();
$png -> setLife(100);
$png -> setName ("Brigitte");
$warrior = new Warrior(70,"Bernard",5);
$warrior -> setEnergy(10);
$mage = new Mage(50,"Binouze", 7);
$mage -> setMana(15);

echo($png -> introduce()."<br>"); 
echo($warrior -> introduce()."<br>");
echo($mage -> introduce())."<br>";
?>