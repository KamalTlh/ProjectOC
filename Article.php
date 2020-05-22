<?php
require 'Database.php';

class Article extends Database {

    public function getArticles(){
        $sql = 'SELECT id, title, content, author, date_creation FROM article ORDER BY id DESC';
        return $result = $this->createQuery($sql);
    }

    public function getArticle($articleId){
        $sql = 'SELECT id, title, content, author, date_creation FROM article WHERE id=?';
        return $result = $this->createQuery($sql, [
            $articleId
        ]);
    }
}