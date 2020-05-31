<?php
namespace App\controller;

class ArticleController extends Controller{

    public function home(){
        $articles = $this->articleModel->getArticles();
        return $this->view->render('home',[
            'articles'=>$articles
        ]);
    }

    public function article(){
        $article = $this->articleModel->getArticle($_GET['articleId']);
        $comments = $this->commentModel->getCommentsFromArticle($_GET['articleId']);
        return $this->view->render('single',[
            'article'=>$article,
            'comments'=>$comments
        ]);
    }

    public function addArticle($post){
        if(isset($post['submit'])){
            $this->articleModel->addArticle($post);
            header('Location: ../public/index.php');
        }
        return $this->view->render('NewArticle', []);
    }

    public function deleteArticle($articleId){
        $this->articleModel->deleteArticle($articleId);
        header('Location: ../public/index.php');
    }
}