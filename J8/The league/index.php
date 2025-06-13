<?php

require_once __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
        $twig = new \Twig\Environment($loader,[
            'debug' => true,
]);

$data = [
    "pageTitle" => "The League",
    "links" => ["Les teams","les players","les matchs"],
    "title" => "Les teams de la league",
    "images"=> ["angry-owls","chatty-parrots","panthers","sparrow","vendetta"]
    ];
    
echo $twig->render("teams.html.twig", $data);

?>