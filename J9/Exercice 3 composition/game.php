<?php

require "Character.php";


$userRagnar = new Character("Ragnar");

$userRagnar -> getWeapon() -> setName("Sword");
$userRagnar -> getWeapon() -> setDamages(10);

echo $userRagnar -> getName(). " got a " . $userRagnar -> getWeapon() -> getName() . " who does " . $userRagnar -> getWeapon() ->getDamages() . " damages <br>";

echo $userRagnar -> fight()


?>