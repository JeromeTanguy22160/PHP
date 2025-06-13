
<?php

/*url possibles :
index.php
index.php?route=category&category=1
index.php?route=post&post=1
index.php?route=toutautrechose
*/


if (isset($_GET["route"]) && $_GET["route"] === "category" && isset($_GET["category"])){
    require "controllers/category.php";
    categoryPage();
}
else if (isset($_GET["route"]) && $_GET["route"] === "post" && isset($_GET["post"])){
    require "controllers/post.php";
    postPage();
}
else {
    require "controllers/home.php";
    homePage();
}

?>