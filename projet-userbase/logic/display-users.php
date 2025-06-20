<?php

require "managers/UserManager.class.php";

$usersR = new Usermanager;
$usersR->loadUsers();
$usersArray = $usersR -> getUsers();

?>
