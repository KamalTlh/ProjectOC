<?php
namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\commentDAO;
use App\src\model\View;

class FrontController{
    private $articleDAO;
    private $comenntDAO;
    private $view;

    public function __construct(){
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

    public function home(){
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home',[
            'articles'=>$articles
        ]);
    }

    public function article(){
        $article = $this->articleDAO->getArticle($_GET['articleId']);
        $comments = $this->commentDAO->getCommentsFromArticle($_GET['articleId']);
        return $this->view->render('single',[
            'article'=>$article,
            'comments'=>$comments
        ]);
    }
}