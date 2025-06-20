<?php

require "../managers/UserManager.class.php";

$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$role = $_POST["role"];

echo "$username $email $password $role"; 

$newUser = new User($username, $email, $password, $role);

$newmanager = new UserManager();

$newmanager -> saveUser($newUser);

header('Location: https://jerometanguy.sites.3wa.io/PHP/projet-userbase/index.php');

?>