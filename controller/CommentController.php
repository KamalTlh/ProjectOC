<?php
namespace controller;

class CommentController extends Controller{

    public function addComment($post, $articleId, $pseudo){
        if($this->checkLoggedIn() && isset($post['submit'])){
            $errors = $this->validation->validate($post, 'Comment');
            if(!($errors)){
                $this->commentModel->addComment($post, $articleId, $pseudo);
                $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
                header('Location: index.php?route=readarticle&articleId='.$articleId);
            }
            $article = $this->articleModel->getArticle($_GET['articleId']);
            $comments = $this->commentsModel->getCommentsFromArticle($_GET['articleId']);
            return $this->view->render('readarticle', [
                'article'=> $article,
                'comments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }

    public function updateComment($post, $commentId){
        if($this->checkAdmin()){
            $comment = $this->commentModel->getComment($commentId);
            $article = $this->articleModel->getArticle($comment->getArticle_Id());
            if(isset($post['submit'])){
                $this->commentModel->updateComment($post, $commentId);
                $this->session->set('update_comment', 'Le commentaire a bien été modifié.');
                header('Location: index.php?route=readarticle&articleId='.$comment->getArticle_Id());
            }
            return $this->view->render('updatecomment', [
                'comment'=>$comment,
                'article'=>$article
            ]);
        }
    }

    public function deleteComment($commentId){
        if($this->checkAdmin()){
            $this->commentModel->deleteComment($commentId);
            $this->session->set('delete_comment', 'Le commentaire a bien été supprimé.');
            header('Location: index.php?route=administration');
        }
    }

    public function flagComment($commentId){
        if($this->checkLoggedIn()){
            $comment = $this->commentModel->getComment($commentId);
            $this->commentModel->flagComment($commentId);
            $this->session->set('flag_comment', 'Le commentaire a bien été signalé.');
            header('Location: index.php?route=readarticle&articleId='.$comment->getArticle_Id());
        }
    }

    public function unflagComment($commentId){
        if($this->checkLoggedIn()){
            $comment = $this->commentModel->getComment($commentId);
            $this->commentModel->unflagComment($commentId);
            $this->session->set('unflag_comment', 'Le commentaire n\'est plus signalé.');
            header('Location: index.php?route=administration');
        }
    }
}