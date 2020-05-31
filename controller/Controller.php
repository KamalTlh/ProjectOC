<?php
namespace App\controller;
use App\model\ArticleModel;
use App\model\CommentModel;
use App\view\View;

abstract class Controller{
    protected $articleModel;
    protected $commentModel;
    protected $view;

    public function __construct(){
        $this->articleModel = new ArticleModel();
        $this->commentModel = new CommentModel();
        $this->view = new View();
    }
}