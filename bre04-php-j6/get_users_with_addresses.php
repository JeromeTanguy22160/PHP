<?php

require "connexion.php";

$query = $db->prepare('SELECT * FROM users 
LEFT JOIN address ON users.address = address.id');

$query->execute();
$user = $query ->fetchALL(PDO::FETCH_ASSOC);

var_dump($user);
?>