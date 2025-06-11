<?php

require "connexion.php";

$query = $db->prepare('SELECT users.*, address.* FROM users 
JOIN address ON users.address = address.id
WHERE users.id = :id');

$parameter = [
    'id'=> $_GET['id']
    ];
    
$query->execute($parameter);
$user = $query ->fetch(PDO::FETCH_ASSOC);

var_dump($user);
?>