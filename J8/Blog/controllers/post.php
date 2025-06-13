<?php

function postPage() : void
{
    $postId = $_GET["post"];

    require "managers/post_manager.php";
    
    $post = getPost($postId);

    $template = "templates/post.phtml";
    require "templates/layout.phtml";
}

?>