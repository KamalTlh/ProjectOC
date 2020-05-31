<?php
namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\model\View;

class BackController{
    private $articleDAO;
    private $view;

    public function __construct(){
        $this->articleDAO = new ArticleDAO();
        $this->view = new View();
    }

    public function addArticle($post){
        if(isset($post['submit'])){
            $this->articleDAO->addArticle($post);
            header('Location: ../public/index.php');
        }
        return $this->view->render('NewArticle', []);
    }

    public function deleteArticle($articleId){
        $this->articleDAO->deleteArticle($articleId);
        header('Location: ../public/index.php');
    }
}