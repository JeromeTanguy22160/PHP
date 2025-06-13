<?php

require "../connexion.php";


$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["password"];

if (isset($_POST["password"])){
    $hash = password_hash($password, PASSWORD_DEFAULT);
}

$query = $db -> prepare("INSERT INTO users(id, email, password, first_name, last_name) 
VALUES(NULL, :email, :password, :first_name, :last_name)");
$parameters = [
    "email" => $email,
    "password" => $hash,
    "first_name" => $first_name,
    "last_name" => $last_name
    
    ];
$query -> execute($parameters);

header('Location: https://jerometanguy.sites.3wa.io/PHP/bre04-php-j7/Auth/index.php');
?>