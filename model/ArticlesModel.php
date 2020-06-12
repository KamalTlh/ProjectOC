<?php
namespace App\model;
use App\model\ArticleModel;

class ArticlesModel extends Model {

    private $articles;

    public function getArticles(){
        return $this->articles;
    }

    public function setArticles($articles){
        $this->articles = $articles;
    }

    public function getListArticles(){
        $sql = 'SELECT id, title, content, author, date_creation FROM article ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row){
            $article = new ArticleModel();
            $articleId = $row['id'];
            $articles[$articleId] = $article->hydrate($row);
        }
        $result->closeCursor();
        $this->setArticles($articles);
        return $articles;
    }
}