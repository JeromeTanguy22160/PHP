<?php

class PostManager extends AbstractManager {
    
    public function __construct(){
        parent :: __construct();
    }
    
    public function loadPosts() : array {
        
        $query = $this -> db -> prepare("
        SELECT posts.*,categories.title_en,categories.title_fr,categories.description_en,categories.description_fr 
        FROM posts 
        JOIN categories ON category = categories.id");
        $query -> execute();
        $postsData = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $posts = [];
        
        foreach ($postsData as $postData){
            
            if ($_SESSION["lang"] === "fr") {
                $category = new Category($postData["title_fr"], $postData["description_fr"], $postData["title_fr"], $postData["description_fr"]);
                $post = new Post($postData["title_fr"], $postData["excerpt_fr"], $postData["title_fr"], $postData["excerpt_fr"]);
            } else {
                $category = new Category($postData["title_en"], $postData["description_en"], $postData["title_en"], $postData["description_en"]);
                $post = new Post($postData["title_en"], $postData["excerpt_en"], $postData["title_en"], $postData["excerpt_en"]);
            }
            $category -> setId($postData["category"]);
            $post -> setId($postData["id"]);
            $post -> setCategory($category);
            $posts[] = $post;
        }
        return $posts;
    }
}

?>