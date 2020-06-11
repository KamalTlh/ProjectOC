<?php
namespace App\controller;

class CommentController extends Controller{

    public function addComment($post, $articleId){
        if(isset($post['submit'])){
            $this->commentModel->addComment($post, $articleId);
            $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
            header('Location: ../public/index.php?route=article&articleId='.$articleId);
        }
    }

    public function updateComment($post, $commentId){
        $comment = $this->commentModel->getComment($commentId);
        $article = $this->articleModel->getArticle($comment->getArticle_Id());
        if(isset($post['submit'])){
            $this->commentModel->updateComment($post, $commentId);
            $this->session->set('update_comment', 'Le commentaire a bien été modifié');
            header('Location: ../public/index.php?route=article&articleId='.$comment->getArticle_Id());
        }
        return $this->view->render('UpdateComment', [
            'comment'=>$comment,
            'article'=>$article
        ]);
    }

    public function deleteComment($commentId){
        $this->commentModel->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php');
    }

    public function flagComment($commentId){
        $this->commentModel->flagComment($commentId);
        header('Location: ../public/index.php');
    }
}