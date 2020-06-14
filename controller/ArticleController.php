<?php
namespace App\controller;

class ArticleController extends Controller{

    public function home(){
        $articles = $this->articlesModel->getListArticles();
        return $this->view->render('home',[
            'articles'=>$articles
        ]);
    }

    public function article(){
        $article = $this->articleModel->getArticle($_GET['articleId']);
        $comments = $this->commentsModel->getCommentsFromArticle($_GET['articleId']);
        return $this->view->render('ReadArticle',[
            'article'=>$article,
            'comments'=>$comments
        ]);
    }

    public function addArticle($post){
        if(isset($post['submit'])){
            $errors = $this->validation->validate($post, 'Article');
            if(!($errors)){
                $this->articleModel->addArticle($post);
                $this->session->set('add_article', 'Le nouvel article a bien été ajouté');
                header('Location: ../public/index.php');
            }
            return $this->view->render('CreateArticle', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('CreateArticle');
    }

    public function updateArticle($post, $articleId){
        $article = $this->articleModel->getArticle($articleId);
        if(isset($post['submit'])){
            $this->articleModel->updateArticle($post, $articleId);
            $this->session->set('update_article', 'L\'article a bien été modifié');
            header('Location: ../public/index.php?route=Administration');
        }
        return $this->view->render('UpdateArticle', [
            'article'=>$article
        ]);
    }

    public function deleteArticle($articleId){
        $this->articleModel->deleteArticle($articleId);
        $this->session->set('delete_article', 'L\'article a bien été supprimé');
        header('Location: ../public/index.php?route=Administration');
    }
}