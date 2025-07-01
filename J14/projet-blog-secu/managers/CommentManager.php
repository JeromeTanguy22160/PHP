<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CommentManager extends AbstractManager
{
    public function __construct(){
        parent :: __construct();
    }
    
    public function findByPost(int $postId) : array {
        
        $postManager = new PostManager();
        $postObject = $postManager->findOne($postId);
        
        $query = $this -> db -> prepare ("SELECT comments.*,users.username, users.email, users.password, users.role, users.created_at, users.id as user_id 
        FROM comments 
        JOIN users ON comments.user_id = users.id
        WHERE post_id = :postId");
        $parameters = [
            'postId' => $postId
            ];
        $query -> execute($parameters);
        $commentsData = $query->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];
        
        foreach($commentsData as $commentData){
            $user = new User($commentData["username"],$commentData["email"], $commentData["password"],$commentData["role"]);
            $user -> setId($commentData["user_id"]);
            $user -> setCreatedAt($commentData["created_at"]);
            $comment = new Comment($commentData["content"], $user, $postObject);
            $comment -> setId($commentData["id"]);
            $comments[] = $comment;
        }
        return $comments;
    }
    
    public function create(Comment $comment) :void {
        $query = $this -> db -> prepare("SELECT * FROM comments WHERE content = :content
        AND user_id = :user_id AND post_id = :post_id");
        $parameters = [
        "content" => $comment ->getContent(),
        "user_id" => $comment->getUser()->getId(),
        "post_id" => $comment->getPost()->getId()
        ];
        $query -> execute($parameters);
        $commentExist = $query -> fetch(PDO::FETCH_ASSOC);
    
        if (!$commentExist){
          $query = $this -> db -> prepare("INSERT INTO comments(content, user_id, post_id) 
          VALUES(:content,:user_id,:post_id)");
          $parameters = [
              "content" => $comment -> getContent(),
              "user_id" => $comment -> getUser() -> getId(),
              "post_id" => $comment -> getPost() -> getId()
              ]; 
          $query -> execute($parameters);
          $comment -> setId($this -> db -> lastInsertId());
        }
    }
}