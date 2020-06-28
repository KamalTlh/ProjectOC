<?php
namespace controller;
use model\ArticleModel;
use model\ArticlesModel;
use model\CommentModel;
use model\CommentsModel;
use model\UserModel;
use model\UsersModel;
use view\View;
use config\Session;
use constraint\Validation;

abstract class Controller{
    protected $articleModel;
    protected $articlesModel;
    protected $commentModel;
    protected $commentsModel;
    protected $userModel;
    protected $usersModel;
    protected $view;
    protected $session;
    protected $validation;

    public function __construct(){
        $this->articleModel = new ArticleModel();
        $this->articlesModel = new ArticlesModel();
        $this->commentModel = new CommentModel();
        $this->commentsModel = new CommentsModel();
        $this->userModel = new UserModel();
        $this->usersModel = new UsersModel();
        $this->view = new View();
        $this->session = new Session($_SESSION);
        $this->validation = new Validation();
    }

    protected function checkLoggedIn(){
        if(!($this->session->get('role'))){
            $this->session->set('need_login', 'Vous devez être vous connectez pour accéder à cette page');
            header('Location: index.php?route=login');
        }
        else{
            return true;
        }
    }

    protected function checkAdmin(){
        if(!($this->session->get('role') === 'admin')){
            $this->session->set('need_admin', 'Vous devez être administrateur pour accéder à cette page');
            header('Location: index.php');
        }
        else{
            return true;
        }
    }
}