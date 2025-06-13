<?php

session_start();
require "../connexion.php";

$email = $_POST["email"];
$password = $_POST["password"];

$query = $db->prepare("SELECT * FROM users WHERE email = :email");
$parameters = [
    "email" => $email
    ];
    
$query -> execute($parameters);
$user = $query ->fetch(PDO::FETCH_ASSOC);

if($user === false){
    echo "<h1>Email incorrect</h1>";
}
else{ 
    $isPasswordCorrect = password_verify($password, $user["password"]);
    if (!$isPasswordCorrect){
        echo "<h1>Mot de passe incorrect</h1>";
    }
    else{
        $_SESSION["user"] = [
            "last_name" => $user["last_name"],
            "first_name" => $user["first_name"]
            ];
        header('Location: https://jerometanguy.sites.3wa.io/PHP/bre04-php-j7/Auth/index.php');
    }
}

?>