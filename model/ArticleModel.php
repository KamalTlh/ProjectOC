<?php
namespace App\model;

class ArticleModel extends Model {
    private $id;
    private $title;
    private $content;
    private $author;
    private $date_creation;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function getDate_Creation(){
        return $this->date_creation;
    }

    public function setDate_Creation($date_creation){
        $this->date_creation = $date_creation;
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

    public function getArticle($articleId){
        $sql = 'SELECT id, title, content, author, date_creation FROM article WHERE id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->hydrate($article);
    }

    public function addArticle($article){
        extract($article);
        $sql = 'INSERT INTO article (title, content, author, date_creation) VALUES (?, ?, ?, NOW())';
        $this->createQuery($sql, [$title, strip_tags($content), $author]);
    }
    
    public function updateArticle($article, $articleId){
        extract($article);
        $sql = 'UPDATE article SET title = ?, content = ?, author = ? WHERE id = ?';
        $this->createQuery($sql, [$title, strip_tags($content), $author, $articleId]);
    }

    public function deleteArticle($articleId){
        $sql = 'DELETE FROM article WHERE id = ?';
        $this->createQuery($sql, [$articleId]);
    }
}