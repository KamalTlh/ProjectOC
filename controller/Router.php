<?php
namespace controller;

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
                if($_GET['route'] === 'readarticle'){
                    $this->articleController->article();
                }
                elseif($_GET['route'] === 'createarticle'){
                    $this->articleController->addArticle($_POST);
                }
                elseif($_GET['route'] === 'updatearticle'){
                    $this->articleController->updateArticle($_POST, $_GET['articleId']);
                }
                elseif($_GET['route'] === 'deletearticle'){
                    $this->articleController->deleteArticle($_GET['articleId']);
                }
                elseif($_GET['route'] === 'createcomment'){
                    $this->commentController->addComment($_POST, $_GET['articleId'], $_SESSION['pseudo']);
                }
                elseif($_GET['route'] === 'updatecomment'){
                    $this->commentController->updateComment($_POST, $_GET['commentId']);
                }
                elseif($_GET['route'] === 'deletecomment'){
                    $this->commentController->deleteComment($_GET['commentId']);
                }
                elseif($_GET['route'] === 'flagcomment'){
                    $this->commentController->flagComment($_GET['commentId']);
                }
                elseif($_GET['route'] === 'unflagcomment'){
                    $this->commentController->unflagComment($_GET['commentId']);
                }
                elseif($_GET['route'] === 'login'){
                    $this->userController->login($_POST);
                }
                elseif($_GET['route'] === 'logout'){
                    $this->userController->logout();
                }
                elseif($_GET['route'] === 'profile'){
                    $this->userController->profile($_GET['userId']);
                }
                elseif($_GET['route'] === 'createuser'){
                    $this->userController->createUser($_POST);
                }
                elseif($_GET['route'] === 'readuser'){
                    $this->userController->readUser($_GET['userId']);
                }
                elseif($_GET['route'] === 'updateuser'){
                    $this->userController->updateUser($_POST, $_GET['userId']);
                }
                elseif($_GET['route'] === 'deleteuser'){
                    $this->userController->deleteUser($_GET['userId']);
                }
                elseif($_GET['route'] === 'updatepassword'){
                    $this->userController->updatePassword($_POST, $_GET['userId']);
                }
                elseif($_GET['route'] === 'administration'){
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