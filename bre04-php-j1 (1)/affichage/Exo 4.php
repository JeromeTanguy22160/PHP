<?php
    $users = [
        [
            "firstName" => "Bugs",
            "lastName" => "Bunny",
            "age" => 29
        ],
        [
            "firstName" => "Roger",
            "lastName" => "Rabbit",
            "age" => 17
        ]
    ];
    
    function majorite(int $age): bool{
        if($age <= 18){
            return false;
        }
        else {
            return true;
        }
    }
    
?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 4</title>
    </head>
    <body>
        <h1>
            Liste des utilisateurs
        </h1>
        <ul>
            <?php 
            
            foreach($users as $user){
                if (majorite($user["age"]) === true){
                    echo "<li> $user[firstName] $user[lastName] est majeur </li>";
                }
                else if (majorite($user["age"]) === false ){
                     echo "<li> $user[firstName] $user[lastName] est mineur</li>";
                };
            
            }
            ?>
        </ul>
    </body>
</html>