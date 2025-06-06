<?php

if(isset($_GET["heroName"]))
{
    $heroName = $_GET["heroName"];
    
    $choiceShortSentence = "Bonjour {$heroName},<br> Que décidez vous ?";
    $eventDescription = "Le roi vous fait demander ! ";
    $eventImage= "door.png";
    $choices = [
    "Vous vous rendez au chateau.",
    "Vous decidez de vous de faire le grand tour il peut attendre.",
    "Rien a foutre le roi juste un abruti avec une couronne,<br> je vais faire un tour dans la forêt !"];
    $eventNumber = 0;
    $color= "choice"; 
}

else if(isset($_GET["choice"]) && $_GET["choice"] === "choice-0" && isset($_GET["eventNumber"]) && $_GET["eventNumber"] === "0")
{
    $choiceShortSentence = "Que faites-vous ?";
    $eventDescription = "Le roi vous accueille avec un sourire bien trop enthousiaste pour être sincère.<br> Il vous tend une carte mystérieuse.
 ";
    $eventImage= "tower.png";
    $choices = [
    "Vous prenez la carte et partez en mission.",
    "Vous pointez un doigt accusateur sur le roi :<br> \"Vous me cachez quelque chose, vieille canaille !\""
    ];
    $eventNumber = 4;
    $color= "choice-red"; 
    
}

else if(isset($_GET["choice"]) && $_GET["choice"] === "choice-0" && isset($_GET["eventNumber"]) && $_GET["eventNumber"] === "4" )
    {
    $choiceShortSentence = "Vous suivez l’itinéraire jusqu’à une <br> montagne… mais un dragon vous y attend.<br> Il vous regarde comme un steak saignant.";
    $eventDescription = "FIN : Le dragon s’envole, vous embrase et vous succombez.
                         DESOLÉ (en fait non) 
                        ";
    $eventImage= "dragon.png";
    $choices = [];
    $eventNumber = 5;
    $color= "choice-red"; 
    }

 
else if(isset($_GET["choice"]) && $_GET["choice"] === "choice-1" && isset($_GET["eventNumber"]) && $_GET["eventNumber"] === "4")
    {
    $choiceShortSentence = "Il ordonne aux gardes de vous enfermer.<br>
                            La nuit venue, un hurlement... <br>Un loup-garou descend des catacombes,<br> affamé comme jamais.";
    $eventDescription = " FIN : Vous vous faites rattraper par le werewolf et il vous dévore.<br>
                          DESOLÉ (en fait non)
                        ";
    $eventImage= "werewolf.png";
    $choices = [];
    $eventNumber = 6;
    $color= "choice-dark-blue"; 
    }
    
else if(isset($_GET["choice"]) && $_GET["choice"] === "choice-1" && isset($_GET["eventNumber"]) && $_GET["eventNumber"] === "0")
{
    $choiceShortSentence = "Que choisissez-vous ?";
    $eventDescription = "Vous passez par la route royale
                        Après quelques heures, vous trouvez un panneau :

                        ➤ Chemin sûr – lent mais paisible
                        ➤ Chemin rapide – sombre, brumeux, probablement maudit
    ";
    $eventImage= "map.png";
    $choices = [
    "Chemin sûr",
    "Chemin rapide"
    ];
    $eventNumber = 2;
    $color= "choice-grey-blue";
}

else if(isset($_GET["choice"]) && $_GET["choice"] === "choice-0" && isset($_GET["eventNumber"]) && $_GET["eventNumber"] === "2" )
{
    $choiceShortSentence = "Au bout d’un champ de tournesols, <br>un coffre scintille au soleil.<br> Aucune protection.<br> Trop beau pour être vrai ?";
    $eventDescription = " FIN : Vous trouvez le coffre.<br> Félicitations, vous rentrez sauf… <br>mais tant d’argent attire la convoitise <br>(surtout chez nous !)
                        ";
    $eventImage= "treasure.png";
    $eventNumber = 7;
    $choices = [];
    $color= "choice-grey-blue";
}

else if(isset($_GET["choice"]) && $_GET["choice"] === "choice-1" && isset($_GET["eventNumber"]) && $_GET["eventNumber"] === "2" )
{
     $choiceShortSentence = "Un dragon vous attendait.<br> Il adore les raccourcis.";
    $eventDescription = "FIN : Vous êtes flambé comme une saucisse.<br>
                        DESOLÉ (en fait non)
                        ";
    $eventImage= "dragon.png";
    $choices = [];
    $eventNumber = 8;
    $color= "choice-red"; 
}

else if(isset($_GET["choice"]) && $_GET["choice"] === "choice-2" && isset($_GET["eventNumber"]) && $_GET["eventNumber"] === "0")
{
   $choiceShortSentence = "Que choisissez-vous ?";
    $eventDescription = "Vous partez dans la forêt<br>
                         La nature est belle… et terrifiante.<br>
                         Un vieux hibou vous regarde fixement. Il parle. C’est déjà inquiétant.
";
    $eventImage= "forest.png";
    $choices = [
    "Vous le suivez, il dit connaître un trésor",
    "Vous l’ignorez et faites un feu de camp avec sa branche",
    ];
    $eventNumber = 3;
    $color= "choice-dark-blue";
}

else if(isset($_GET["choice"]) && $_GET["choice"] === "choice-0" && isset($_GET["eventNumber"]) && $_GET["eventNumber"] === "3" )
{
    $choiceShortSentence = "Le hibou vous guide vers une grotte…<br> Un coffre vous attend,<br> couvert de toiles d’araignée.";
    $eventDescription = " FIN : Vous ouvrez le coffre !<br> Richesse assurée…<br> mais méfiez-vous des voleurs, surtout nous.
                        ";
    $eventImage= "treasure.png";
    $eventNumber = 7;
    $choices = [];
    $color= "choice-grey-blue";
}

else if(isset($_GET["choice"]) && $_GET["choice"] === "choice-1" && isset($_GET["eventNumber"]) && $_GET["eventNumber"] === "3" )
{
     $choiceShortSentence = "Le hibou vous maudit en hiboutin ancien.<br> La nuit, un werewolf vous piste<br> grâce à votre feu. Oups.";
    $eventDescription = "FIN : Vous êtes dévoré avec élégance.<br>DESOLÉ (en fait non)
                        ";
    $eventImage= "werewolf.png";
    $choices = [];
    $eventNumber = 8;
    $color= "choice-dark-blue"; 
}

require "templates/choice.phtml";

?>