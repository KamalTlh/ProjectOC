<?php
namespace App\model;

class CommentModel extends Model{
 
    private $id;
    private $pseudo;
    private $content;
    private $date_creation;
    private $flag;
    private $article_id;
    private $comments;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getDate_Creation(){
        return $this->date_creation;
    }

    public function setDate_Creation($date_creation){
        $this->date_creation = $date_creation;
    }

    public function getFlag(){
        return $this->flag;
    }

    public function setFlag($flag){
        $this->flag = $flag;
    }

    public function getArticle_Id(){
        return $this->article_id;
    }

    public function setArticle_Id($article_id){
        $this->article_id = $article_id;
    }

    public function getComments(){
        return $this->comments;
    }

    public function setComments($comments){
        $this->comments = $comments;
    }

    public function hydrate(array $donnees){
        $comment = new CommentModel();
        foreach ($donnees as $key => $value){
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            
            // Si le setter correspondant existe.
            if (method_exists($this, $method)){
            // On appelle le setter.
            $comment->$method($value);
            }
        }
        return $comment;
    }

    public function getCommentsFromArticle($articleId){
        $sql = 'SELECT id, pseudo, content, date_creation, flag, article_id FROM comment WHERE article_id = ? ORDER BY date_creation DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach($result as $row){
            $commentId = $row['id'];
            $comments[$commentId] = $this->hydrate($row);
        }
        $result->closeCursor();
        $this->setComments($comments);
        return $this->getComments();
    }

    public function getComment($commentId){
        $sql = 'SELECT id, pseudo, content, date_creation, flag, article_id FROM comment WHERE id = ?';
        $result = $this->createQuery($sql, [$commentId]);
        $comment = $result->fetch();
        $result->closeCursor();
        return $this->hydrate($comment);
    }

    public function addComment($comment, $articleId){
        extract($comment);
        $sql = 'INSERT INTO comment (pseudo, content, date_creation, flag, article_id) VALUES (?, ?, NOW(), ?, ?)';
        $this->createQuery($sql, [$pseudo, strip_tags($content), 0, $articleId]);
    }

    public function updateComment($comment, $commentId){
        extract($comment);
        echo 'comment: '.$pseudo.' '.$content.' '.$commentId;
        $sql = 'UPDATE comment SET pseudo = ?, content = ? WHERE id = ?';
        $this->createQuery($sql, [$pseudo, strip_tags($content), $commentId]);
    }

    public function deleteComment($commentId){
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }

    public function flagComment($commentId){
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }

    public function getFlagComments(){
        $sql = 'SELECT id, pseudo, content, date_creation, flag, article_id FROM comment WHERE flag = 1 ';
        $result = $this->createQuery($sql);
        $flagComments = [];
        foreach ($result as $row){
            $commentId = $row['id'];
            $flagComments[$commentId] = $this->hydrate($row);
        }
        $result->closeCursor();
        $this->setComments($flagComments);
        return $this->getComments();
    }
}