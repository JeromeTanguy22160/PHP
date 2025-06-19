<?php

require "connexion.php";
require "Assets/User.php";

$superman = [
	"first_name" => "Clark",
	"last_name" => "Kent",
	"email" => "clark.kent@test.fr"
];
// ETAPE 2
$userSuperman = new User($superman["first_name"],$superman["last_name"],$superman["email"]);

// ETAPE 3
$query = $db -> prepare("SELECT * FROM users");
$query -> execute();
$userInfo = $query->fetch(PDO::FETCH_ASSOC);

$userPDO= new User($userInfo["first_name"],$userInfo["last_name"],$userInfo["email"]);
$userPDO-> setId($userInfo["id"]);

echo $userPDO -> getId() . " ";
echo $userPDO -> getFirstname() . " ";
echo $userPDO -> getLastname(). " ";
echo $userPDO -> getEmail(). "<br>";

// ETAPE 4
$query = $db -> prepare("SELECT * FROM users");
$query -> execute();
$usersPDO = $query->fetchAll(PDO::FETCH_ASSOC);

$users= [];

forEach($usersPDO as $userPDO){
   $tempUser = new User ($userPDO["first_name"],$userPDO["last_name"],$userPDO["email"]);
   $tempUser -> setId($userPDO["id"]);
   $users[] = $tempUser;
} 
forEach($users as $user){
echo $user -> getId() ." ";
echo $user -> getFirstname() . " ";
echo $user -> getLastname() ." ";
echo $user -> getEmail() . "<br>";
}

// ETAPE 5
$query = $db->prepare("SELECT * FROM users WHERE email = :email");
$query->execute(["email" => $userSuperman->getEmail()]);
$userExist = $query->fetch(PDO::FETCH_ASSOC);

if (!$userExist) {
$query = $db -> prepare("INSERT INTO users(first_name,last_name,email)
VALUES (:first_name,:last_name,:email)");
$parameters = [
    "first_name" => $userSuperman -> getFirstname(),
    "last_name" => $userSuperman -> getLastname(),
    "email" => $userSuperman -> getEmail()
    ];
$query -> execute($parameters);

$lastId = $db->lastInsertId();

$userSuperman->setId($lastId);

echo $userSuperman -> getId() . " ";
echo $userSuperman -> getFirstname() . " ";
echo $userSuperman -> getLastname(). " ";
echo $userSuperman -> getEmail(). "<br>";
}
?>