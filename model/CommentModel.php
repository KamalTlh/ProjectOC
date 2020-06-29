<?php
namespace model;

class CommentModel extends Model{
 
    private $id;
    private $pseudo;
    private $content;
    private $date_creation;
    private $flag;
    private $article_id;

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

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            
            // Si le setter correspondant existe.
            if (method_exists($this, $method)){
            // On appelle le setter.
            $this->$method($value);
            }
        }
        return $this;
    }

    public function getComment($commentId){
        $sql = 'SELECT id, pseudo, content, date_creation, flag, article_id FROM comment WHERE id = ?';
        $result = $this->createQuery($sql, [$commentId]);
        $comment = $result->fetch();
        $result->closeCursor();
        return $this->hydrate($comment);
    }

    public function addComment($comment, $articleId, $pseudo){
        extract($comment);
        echo 'contenu commentaire: '.$content.'+'.strlen($content);
        $sql = 'INSERT INTO comment (pseudo, content, date_creation, flag, article_id) VALUES (?, ?, NOW(), ?, ?)';
        $this->createQuery($sql, [$pseudo, strip_tags($content), 0, $articleId]);
    }

    public function updateComment($comment, $commentId){
        extract($comment);
        $sql = 'UPDATE comment SET content = ? WHERE id = ?';
        $this->createQuery($sql, [strip_tags($content), $commentId]);
    }

    public function deleteComment($commentId){
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }

    public function flagComment($commentId){
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }

    public function unflagComment($commentId){
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [0, $commentId]);
    }
}