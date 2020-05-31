<?php
namespace App\controller;
use Exception;
use App\controller\ArticleController;
use App\controller\ErrorController;

class Router{
    private $articleController;
    private $errorController;
    
    public function __construct(){
        $this->articleController = new ArticleController();
        $this->errorController = new ErrorController();
    }

    public function run(){
        try{
            if(isset($_GET['route'])){
                if($_GET['route'] === 'article'){
                    $this->articleController->article();
                }
                elseif($_GET['route'] === 'newArticle'){
                    $this->articleController->addArticle($_POST);
                }
                elseif($_GET['route'] === 'deleteArticle'){
                    $this->articleController->deleteArticle($_GET['articleId']);
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