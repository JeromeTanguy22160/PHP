<?php

require "User.php";


$user1 = new User(1,"admin","admin");

$user2 = new User(2,"user","user");

echo $user1->getId();
echo $user1->getUsername();
echo $user1->getPassword();
echo $user2->getId();
echo $user2->getUsername();
echo $user2->getPassword();

?>