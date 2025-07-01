<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CategoryManager extends AbstractManager
{
    public function __construct(){
        parent :: __construct();
    }
    
    public function findAll() : array{
        $query = $this -> db -> prepare("SELECT * FROM categories");
        $query ->execute();
        $categoriesData = $query -> fetchAll(PDO::FETCH_ASSOC);
        
        $categories = [];
        
        foreach($categoriesData as $categoryData){
            $category = new Category($categoryData["title"], $categoryData["description"]);
            $category -> setId($categoryData["id"]);
            $categories[] = $category;
        }
        return $categories;
    }
    
    public function findOne(int $id) : ?Category {
        $query = $this -> db -> prepare("SELECT * FROM categories WHERE id = :id");
        $parameters = [
        "id" => $id,
        ];
        $query -> execute($parameters);
        $categoryData = $query->fetch(PDO::FETCH_ASSOC);
        
        if($categoryData){
            $category = new Category($categoryData["title"], $categoryData["description"]);
            $category -> setId($categoryData["id"]);
            return $category;
        }
        return null;
    }
    
    public function findCategoriesForPost(int $postId) : array {
        $query = $this -> db -> prepare ("SELECT categories.* FROM categories 
        JOIN posts_categories ON categories.id = posts_categories.category_id
        WHERE posts_categories.post_id = :postId");
        $parameters = [
            'postId' => $postId
            ];
        $query -> execute($parameters);
        $categoriesData = $query->fetchAll(PDO::FETCH_ASSOC);
        $categories = [];
        
        foreach($categoriesData as $categoryData){
            $category = new Category($categoryData["title"], $categoryData["description"]);
            $category -> setId($categoryData["id"]);
            $categories[] = $category;
        }
        return $categories;
    }
}