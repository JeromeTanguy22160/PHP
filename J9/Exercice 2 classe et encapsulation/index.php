<?php

require "Character.php";


$character1 = new Character(1);

echo $character1->getFullname();

$character1 -> setFirstname("Sarah");
$character1 -> setLastname("Connor");

echo $character1->getFullname();

?>