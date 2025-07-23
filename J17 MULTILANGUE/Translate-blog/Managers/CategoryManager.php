<?php

class CategoryManager extends AbstractManager {
    
    public function __construct(){
        parent :: __construct();
    }
    
    public function loadCategories() : array {
        
        $query = $this -> db -> prepare("SELECT * FROM categories");
        $query -> execute();
        $categoriesData = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $categories = [];
        
        foreach ($categoriesData as $categoryData){
            if ($_SESSION["lang"] === "fr") {
                $category = new Category($categoryData["title_fr"], $categoryData["description_fr"], $categoryData["title_fr"], $categoryData["description_fr"]);
            } else {
                $category = new Category($categoryData["title_en"], $categoryData["description_en"], $categoryData["title_en"], $categoryData["description_en"]);
            }
            $category -> setId($categoryData["id"]);
            $categories[] = $category;
        }
        return $categories;
    }
    
    public function loadCategory($id) : Category {
        
        $query = $this -> db -> prepare("SELECT * FROM categories WHERE id = :id");
        
        $parameters = [
            "id" => $id
            ];
        $query -> execute($parameters);
        $categoryData = $query->fetch(PDO::FETCH_ASSOC);
        
        if ($_SESSION["lang"] === "fr") {
            $category = new Category($categoryData["title_fr"], $categoryData["description_fr"], $categoryData["title_fr"], $categoryData["description_fr"]);
        } else {
            $category = new Category($categoryData["title_en"], $categoryData["description_en"], $categoryData["title_en"], $categoryData["description_en"]);
        }
        $category -> setId($categoryData["id"]);
        
        return $category;
    }
}

?>