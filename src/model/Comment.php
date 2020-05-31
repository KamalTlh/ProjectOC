<?php
namespace App\src\model;

class Comment{
    private $id;
    private $pseudo;
    private $content;
    private $date_creation;
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

    public function getArticle_Id(){
        return $this->article_id;
    }

    public function setArticle_Id($article_id){
        $this->article_id = $article_id;
    }
}