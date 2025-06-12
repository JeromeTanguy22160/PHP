<?php

$password = $_POST["password"];
$hash= $_POST["hash"];

if(isset($_POST["password"])){
    if(isset($_POST["hash"])){
     
        $isPasswordCorrect = password_verify($password, $hash);
        if($isPasswordCorrect === true){
            echo "Passwords are the same";
        }
        else {echo "Passwords looks different";
            
        }
    }
    
}
?>