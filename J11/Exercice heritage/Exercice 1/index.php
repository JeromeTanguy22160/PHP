<?php

require "Reader.php";

$reader1 = new Reader("monemail","Bipbip");

$reader1 -> addBookToFavorites("L'art de la guerre");
var_dump($reader1 -> addBookToFavorites("Les chaines du mal"));

var_dump($reader1 -> removeBookFromFavorites("L'art de la guerre"));

var_dump($reader1-> login());
?>