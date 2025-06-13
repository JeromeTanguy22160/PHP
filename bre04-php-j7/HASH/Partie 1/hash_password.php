<?php

$password = "";
$hash="";

if(isset($_POST["password"])){
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    echo $hash;
    
}
?>