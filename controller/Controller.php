<?php
namespace App\controller;
use App\model\ArticleModel;
use App\model\CommentModel;
use App\model\UserModel;
use App\view\View;
use App\config\Session;

abstract class Controller{
    protected $articleModel;
    protected $commentModel;
    protected $userModel;
    protected $view;
    protected $session;

    public function __construct(){
        $this->articleModel = new ArticleModel();
        $this->commentModel = new CommentModel();
        $this->userModel = new UserModel();
        $this->view = new View();
        $this->session = new Session($_SESSION);
    }
}