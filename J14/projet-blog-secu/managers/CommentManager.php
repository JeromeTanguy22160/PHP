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
        $query = $this -> db -> prepare ("SELECT comments.* FROM comments 
        WHERE post_id = :postId");
        $parameters = [
            'postId' => $postId
            ];
        $query -> execute($parameters);
        $commentsData = $query->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];
        
        foreach($commentsData as $commentData){
            $comment = new Comment($commentData["content"], $commentData["user_id"], $commentData["post_id"]);
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
        }
        
    }
}