<?php
namespace App\config;
use Exception;
use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;

class Router{
    private $frontController;
    private $backController;
    private $errorController;
    
    public function __construct(){
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run(){
        try{
            if(isset($_GET['route'])){
                if($_GET['route'] === 'article'){
                    $this->frontController->article();
                }
                elseif($_GET['route'] === 'newArticle'){
                    $this->backController->addArticle($_POST);
                }
                elseif($_GET['route'] === 'deleteArticle'){
                    $this->backController->deleteArticle($_GET['articleId']);
                }
                else{
                    $this->errorController->errorPage();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e){
            $this->errorController->errorServer();      
        }
    }
}