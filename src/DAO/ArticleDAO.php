<?php
namespace App\src\DAO;
use App\src\model\Article;

class ArticleDAO extends DAO {

    private function buildObject($row){
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['author']);
        $article->setDate_Creation($row['date_creation']);
        return $article;
    }
    
    public function getArticles(){
        $sql = 'SELECT id, title, content, author, date_creation FROM article ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row){
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    public function getArticle($articleId){
        $sql = 'SELECT id, title, content, author, date_creation FROM article WHERE id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }

    public function addArticle(){
        if(isset($_POST)){
            echo 'Tab: '.implode($_POST).'<br/>';
            $sql= 'INSERT INTO article (title, content, author, date_creation) VALUES (?, ?, ?, NOW())';
            $this->createQuery($sql, [$_POST['title'], $_POST['content'], $_POST['author']]);
            echo 'titre: '.$_POST['title'].'<br/> contenu: '.$_POST['content'].'<br/> Auteur: '.$_POST['author'];
        }
        $this->closeCursor();
    }
}