<?php
namespace model;

class CommentsModel extends Model{

    private $comments;

    public function getComments(){
        return $this->comments;
    }

    public function setComments($comments){
        $this->comments = $comments;
    }

    public function getListComments(){
        $sql= 'SELECT * FROM comment ORDER BY flag DESC';
        $result = $this->createQuery($sql);
        $comments = [];
        foreach($result as $row){
            $comment = new CommentModel();
            $commentId = $row['id'];
            $comments[$commentId] = $comment->hydrate($row);
        }
        $result->closeCursor();
        $this->setComments($comments);
        return $comments;
    }

    public function getCommentsFromArticle($articleId){
        $sql = 'SELECT id, pseudo, content, date_creation, flag, article_id FROM comment WHERE article_id = ? ORDER BY date_creation DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach($result as $row){
            $comment = new CommentModel();
            $commentId = $row['id'];
            $comments[$commentId] = $comment->hydrate($row);
        }
        $result->closeCursor();
        $this->setComments($comments);
        return $comments;
    }

    public function getFlagComments(){
        $sql = 'SELECT id, pseudo, content, date_creation, flag, article_id FROM comment WHERE flag = 1 ';
        $result = $this->createQuery($sql);
        $flagComments = [];
        foreach ($result as $row){
            $comment = new CommentModel();
            $commentId = $row['id'];
            $flagComments[$commentId] = $comment->hydrate($row);
        }
        $result->closeCursor();
        $this->setComments($flagComments);
        return $flagComments;
    }
}