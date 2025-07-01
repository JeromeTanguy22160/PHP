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
    
    private function hydratePost(array $posts): Post {
        $author = new User($posts["username"], $posts["email"], $posts["password"], $posts["role"]);
        $author -> setId($posts["author"]);
        $author -> setCreatedAt($posts["created_at"]);
        
        $categories = $this->findCategoriesForPost($posts["id"]);
        
        $post = new Post($posts["title"], $posts["excerpt"], $posts["content"], $author);
        $post -> setId($posts['id']);
        $post -> setCreatedAt($posts["created_at"]);
        $post -> setCategories($categories);
    
        return $post;
    }
    
    public function findLatest() :array {
    
        $query = $this -> db -> prepare("SELECT posts.*, users.username, users.email,
             users.password, users.role, users.created_at FROM posts 
             JOIN users ON posts.author = users.id 
             ORDER BY posts.created_at DESC LIMIT 4");
        $query ->execute();
        $postsData = $query -> fetchAll(PDO::FETCH_ASSOC);
        
        $posts = [];
        
        foreach($postsData as $postData){
            $posts[] = $this -> hydratePost($postData);
        }
        return $posts;
    }
    
    public function findOne(int $id) :?Post {
        
        $query = $this -> db -> prepare("SELECT posts.*, users.username, users.email,
             users.password, users.role, users.created_at FROM posts 
             JOIN users ON posts.author = users.id 
             WHERE posts.id = :id");
        $parameters = [
        "id" => $id,
        ];
        $query -> execute($parameters);
        $postData = $query->fetch(PDO::FETCH_ASSOC);
        
        if($postData){
            return $this -> hydratePost($postData);
        }
        return null;
    }
    
    public function findByCategory(int $categoryId) : array {
            
        $query = $this -> db -> prepare ("SELECT posts.*, users.username, users.email, users.password, users.role, users.created_at FROM posts 
             JOIN users ON posts.author = users.id
             JOIN posts_categories ON posts.id = posts_categories.post_id
             WHERE posts_categories.category_id = :categoryId ORDER BY posts.created_at");
        $parameters = [
            'categoryId' => $categoryId
            ];
        $query -> execute($parameters);
        $postsData = $query->fetchAll(PDO::FETCH_ASSOC);
        $posts = [];
        
        foreach($postsData as $postData){
            $posts[] = $this -> hydratePost($postData);
        }
        return $posts;
    }
    
    private function findCategoriesForPost(int $postId): array{
        
        $query = $this -> db -> prepare("SELECT categories.* FROM categories
             JOIN posts_categories ON categories.id = posts_categories.category_id 
             WHERE posts_categories.post_id = :postId");
         $parameters = [
            'postId' => $postId
            ];
        $query -> execute($parameters);
        $categoriesData = $query -> fetchAll(PDO::FETCH_ASSOC);
        
        $categories = [];
        
        foreach($categoriesData as $categoryData){
            $category = new Category($categoryData["title"],$categoryData["description"]);
            $category -> setId($categoryData["id"]);
            $categories[] = $category;
        }
        return $categories;
    }
}