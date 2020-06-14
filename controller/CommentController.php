<?php
namespace App\controller;

class CommentController extends Controller{

    public function addComment($post, $articleId){
        if(isset($post['submit'])){
            $errors = $this->validation->validate($post, 'Comment');
            if(!($errors)){
                $this->commentModel->addComment($post, $articleId);
                $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
                header('Location: ../public/index.php?route=readArticle&articleId='.$articleId);
            }
            $article = $this->articleModel->getArticle($_GET['articleId']);
            $comments = $this->commentsModel->getCommentsFromArticle($_GET['articleId']);
            return $this->view->render('ReadArticle', [
                'article'=> $article,
                'comments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }

    public function updateComment($post, $commentId){
        $comment = $this->commentModel->getComment($commentId);
        $article = $this->articleModel->getArticle($comment->getArticle_Id());
        if(isset($post['submit'])){
            $this->commentModel->updateComment($post, $commentId);
            $this->session->set('update_comment', 'Le commentaire a bien été modifié');
            header('Location: ../public/index.php?route=readArticle&articleId='.$comment->getArticle_Id());
        }
        return $this->view->render('UpdateComment', [
            'comment'=>$comment,
            'article'=>$article
        ]);
    }

    public function deleteComment($commentId){
        $this->commentModel->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php?route=Administration');
    }

    public function flagComment($commentId){
        $comment = $this->commentModel->getComment($commentId);
        $this->commentModel->flagComment($commentId);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé');
        header('Location: ../public/index.php?route=readArticle&articleId='.$comment->getArticle_Id());
    }
}