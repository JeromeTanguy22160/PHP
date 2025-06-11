<?php

require "connexion.php";

$query = $db->prepare('SELECT * FROM users WHERE id = :id');

$parameter = [
    'id'=>$_GET['id']
    ];
$query->execute($parameter);
$user = $query ->fetch(PDO::FETCH_ASSOC);

var_dump($user)
?>