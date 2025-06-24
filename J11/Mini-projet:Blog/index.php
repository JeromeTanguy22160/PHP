<?php

require "models/User.php";
require "models/Post.php";
require "models/Category.php";

$user = new User("johndoe", "john@example.com", "securepwd", "admin");
$category = new Category("Tech", "Articles about technology");
$post = new Post("My first post", "A short intro", "Full content here...", 1); // author id = 1

$post->addCategory($category);
$category->addPost($post);

var_dump($user);
var_dump($post);
var_dump($category);

$userManagers = new UserManager 



?>