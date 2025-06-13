<?php

session_start();

if (isset($_SESSION["pseudo"])){
    echo "Bienvenue {$_SESSION["pseudo"]}";
}
else {
    echo "Bienvenue invité";
};
?>