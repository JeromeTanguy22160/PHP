<?php

require "connexion.php";

$id = $_POST["id"];

$query = $db->prepare("DELETE FROM address WHERE id = :id");

$parameters = [
    "id" => $id,
    ];

$query->execute($parameters);
?>