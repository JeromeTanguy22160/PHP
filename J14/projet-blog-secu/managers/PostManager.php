<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class PostManager extends AbstractManager
{
    private CategoryManager $categoryManager;
    
    public function __construct(){
        parent :: __construct();
         $this->categoryManager = new CategoryManager();
    }
    
    public function findLastest() :array {
    
        $query = $this -> db -> prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 4");
        $query ->execute();
        $postsData = $query -> fetchAll(PDO::FETCH_ASSOC);
        
        $posts = [];
        
        foreach($postsData as $postData){
            $post = new Post($postData["title"], $postData["excerpt"], $postData["content"], $postData["User"]);
            $post -> setId($postData["id"]);
            $categories = $this->categoryManager->findByPost($postData["id"]);
            $post -> setCategories($categories);
            $posts[] = $post;
        }
        return $posts;
    }
    
    public function findOne(int $id) :?Post {
        
        $query = $this -> db -> prepare("SELECT * FROM posts WHERE id = :id");
        $parameters = [
        "id" => $id,
        ];
        $query -> execute($parameters);
        $postData = $query->fetch(PDO::FETCH_ASSOC);
        
        if($postData){
            $post = new Post($postData["title"], $postData["excerpt"], $postData["content"], $postData["User"]);
            $post -> setId($postData["id"]);
            $categories = $this->categoryManager->findByPost($postData["id"]);
            $post -> setCategories($categories);
            return $post;
        }
        return null;
    }
    
    public function findByCategory(int $categoryId) : array {
            
        $query = $this -> db -> prepare ("SELECT posts.* FROM posts 
        JOIN posts_categories ON posts.id = posts_categories.post_id
        WHERE posts_categories.category_id = :categoryId");
        $parameters = [
            'categoryId' => $categoryId
            ];
        $query -> execute($parameters);
        $postsData = $query->fetchAll(PDO::FETCH_ASSOC);
        $posts = [];
        
        foreach($postsData as $postData){
            $post = new Post($postData["title"], $postData["excerpt"], $postData["content"], $postData["User"]);
            $post -> setId($postData["id"]);
            $categories = $this->categoryManager->findByPost($postData["id"]);
            $post -> setCategories($categories);
            $posts[] = $post;
        }
        return $posts;
    }
}