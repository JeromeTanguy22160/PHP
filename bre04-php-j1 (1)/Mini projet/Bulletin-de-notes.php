<?php

$students = [
    [
        "firstName" => "Hannah",
        "lastName" => "Fields",
        "grades" => [12, 11, 15],
        "average" => -1
    ],
    [
        "firstName" => "Richard",
        "lastName" => "Stein",
        "grades" => [18, 12, 13],
        "average" => -1
    ],
    [
        "firstName" => "Mark",
        "lastName" => "Hartoff",
        "grades" => [9, 11, 10],
        "average" => -1
    ],
    [
        "firstName" => "Charlie",
        "lastName" => "Nestle",
        "grades" => [9, 8, 5],
        "average" => -1
    ],
    [
        "firstName" => "Suzy",
        "lastName" => "Brent",
        "grades" => [18, 15, 16],
        "average" => -1
    ]
];


function computeAverage(array $grades) : float {
    
    $sum = 0 ;
    
    foreach ($grades as $grade) {
        $sum += $grade ;
    }
    return $sum / count($grades);
}

function colorArticle(array $grades) : string {
    if (computeAverage($grades) < 10){
        return "red";
    }
    else if(computeAverage($grades) >= 10 && computeAverage($grades) <= 13){
        return "orange";
    }
    else if(computeAverage($grades)> 13){
        return "green";
    }
}
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="bulletin-de-notes.css" type="text/css" />
        <title>Bulletin de notes</title>
    </head>
    <body>
        <h1>
            Bulletin de notes
        </h1>
        <h2>
            Liste des étudiants
        </h2>
        <ul id="students">
            <?php foreach($students as $student){ ?>
                <li>
                <article class="<?= colorArticle($student["grades"]) ?>">
                    <header>
                         <h1> <?= ($student["firstName"]).' '.($student["lastName"]) ?> </h1>
                    </header>
                    <section>
                    <h2>Notes : </h2>
                        <ul>
                         <?php foreach($student["grades"] as $grade){ ?>
                        <li><?= $grade ?></li>
                         <?php } ?>
                        </ul>
                    </section>
                     <footer>
                         
                        <h3><?= computeAverage($student["grades"]) ?></h3>
                    </footer>
                </article>
            </li>
           <?php } ?>
        </ul>
    </body>
</html>