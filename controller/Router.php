<?php
namespace App\controller;
use Exception;
use App\controller\ArticleController;
use App\controller\CommentController;
use App\controller\ErrorController;
use App\controller\UserController;

class Router{
    private $articleController;
    private $commentController;
    private $errorController;
    private $userController;
    
    public function __construct(){
        $this->articleController = new ArticleController();
        $this->commentController = new CommentController();
        $this->errorController = new ErrorController();
        $this->userController = new UserController();
    }

    public function run(){
        try{
            if(isset($_GET['route'])){
                if($_GET['route'] === 'article'){
                    $this->articleController->article();
                }
                elseif($_GET['route'] === 'addArticle'){
                    $this->articleController->addArticle($_POST);
                }
                elseif($_GET['route'] === 'updateArticle'){
                    $this->articleController->updateArticle($_POST, $_GET['articleId']);
                }
                elseif($_GET['route'] === 'deleteArticle'){
                    $this->articleController->deleteArticle($_GET['articleId']);
                }
                elseif($_GET['route'] === 'addComment'){
                    $this->commentController->addComment($_POST, $_GET['articleId']);
                }
                elseif($_GET['route'] === 'updateComment'){
                    $this->commentController->updateComment($_POST, $_GET['commentId']);
                }
                elseif($_GET['route'] === 'deleteComment'){
                    $this->commentController->deleteComment($_GET['commentId']);
                }
                elseif($_GET['route'] === 'flagComment'){
                    $this->commentController->flagComment($_GET['commentId']);
                }
                elseif($_GET['route'] === 'login'){
                    $this->userController->login($_POST);
                }
                elseif($_GET['route'] === 'register'){
                    $this->userController->createUser($_POST);
                }
                elseif($_GET['route'] === 'updateUser'){
                    $this->userController->updateUser($_POST, $_GET['userId']);
                }
                elseif($_GET['route'] === 'deleteUser'){
                    $this->userController->deleteUser($_GET['userId']);
                }
                elseif($_GET['route'] === 'profilAdmin'){
                    $this->userController->administration();
                }
                else{
                    $this->errorController->errorPage();
                }
            }
            else{
                $this->articleController->home();
            }
        }
        catch (Exception $e){
            $this->errorController->errorServer();      
        }
    }
}