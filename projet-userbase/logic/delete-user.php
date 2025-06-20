<?php

require "../managers/UserManager.class.php";

if(isset ($_GET["id"])){
    
    $userManager = new UserManager();
    
    $user = new User("", "", "", "");
    
    $user->setId($_GET["id"]);
    
    $userManager->deleteUser($user);
}

header('Location: https://jerometanguy.sites.3wa.io/PHP/projet-userbase/index.php');

?>