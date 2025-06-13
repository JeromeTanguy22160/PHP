<?php

function getCategory(int $categoryId) : array
{
    // remplissez cette fonction pour qu'elle puisse récupérer toutes les infos d'une catégorie
    require __DIR__ ."/../connexion.php";
    
    $query = $db->prepare("SELECT * FROM categories WHERE categories.id = :categoryId");
    $parameters = [
        "categoryId" => $categoryId
    ];
    $query->execute($parameters);
    $category = $query->fetch(PDO::FETCH_ASSOC);
    return $category;
}

function getCategories() : array
{
    // remplissez cette fonction pour qu'elle puisse récupérer toutes les infos de toutes les catégories
require __DIR__ ."/../connexion.php";
    
    $query = $db->prepare("SELECT * FROM categories");
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $categories;
}

function getPostsForCategory(int $categoryId) : array
{
    require __DIR__ ."/../connexion.php";
    
    $query = $db->prepare("SELECT posts.*, medias.url, medias.alt FROM posts JOIN medias ON posts.image = medias.id WHERE posts.category = :categoryId");
    $parameters = [
        "categoryId" => $categoryId
    ];
    $query->execute($parameters);
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $posts;
}
?>