<?php

$host = "db.3wa.io";
$port = "3306";
$dbname = "jerometanguy_phpj6";
$connexionString = 
"mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

$user = "jerometanguy";
$password = "8c0fd20dad924c8515bad2a87efb64f0";

$db = new PDO(
    $connexionString,
    $user,
    $password
);

var_dump($db)
?>