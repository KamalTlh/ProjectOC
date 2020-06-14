<?php
namespace App\controller;
use App\model\ArticleModel;
use App\model\ArticlesModel;
use App\model\CommentModel;
use App\model\CommentsModel;
use App\model\UserModel;
use App\model\UsersModel;
use App\view\View;
use App\config\Session;
use App\constraint\Validation;

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
}