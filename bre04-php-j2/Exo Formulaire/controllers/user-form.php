<?php 

$email = $_POST["email"];
$motdepasse = $_POST["motDePasse"];
$confirmation = $_POST["confirmation"];
$newsletter = isset($_POST["newsletter"]);

echo("Email : $email | Mot de passe : $motdepasse |
Confirmation : $confirmation | Newsletter : $newsletter <br>");

if ($motdepasse === $confirmation){
    echo "Vérification des mots de passe : OK<br>";
}
else{
    echo "Vérification des mots de passe : Not OK<br>";
}

if ($newsletter === true){
    echo "Email : $email | Mot de passe : $motdepasse | Newsletter : Oui"; 
}
else{
    echo "Email : $email | Mot de passe : $motdepasse | Newsletter : Non";
}
?>