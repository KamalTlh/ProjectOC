<?php
namespace App\model;
use App\model\Comment;


class commentModel extends Model{

    private function buildObject($row){
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setDate_Creation($row['date_creation']);
        return $comment;
    }

    public function getCommentsFromArticle($articleId){
        $sql = 'SELECT id, pseudo, content, date_creation FROM comment WHERE article_id = ? ORDER BY date_creation DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach($result as $row){
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
}