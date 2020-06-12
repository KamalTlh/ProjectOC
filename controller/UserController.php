<?php
namespace App\controller;

class UserController extends Controller{

    public function login(){
        $this->view->render('login', []);
    }

    public function createUser($post){
        if(isset($post['submit'])){
            $this->userModel->createUser($post);
            header('Location: ../public/index.php');
        }
        return $this->view->render('register', []);
    }

    public function readUser($userId){
        $user = $this->userModel->getUser($userId);
        return $this->view->render('ReadUser', [
            'user'=> $user
        ]);
    }

    public function updateUser($post, $userId){
        $user = $this->userModel->getUser($userId);
        if(isset($post['submit'])){
            $this->userModel->updateUser($post, $userId);
            header('Location: ../public/index.php?route=profilAdmin');
        }
        return $this->view->render('updateUser',[
            'user'=> $user
        ]);
    }

    public function deleteUser($userId){
        $this->userModel->deleteUser($userId);
        header('Location: ../public/index.php?route=profilAdmin'); 
    }

    public function administration(){
        $articles = $this->articlesModel->getListArticles();
        $users = $this->usersModel->getListUsers();
        $flagComments = $this->commentsModel->getFlagComments();
        
        return $this->view->render('Administration', [
            'users'=> $users,
            'articles'=> $articles,
            'flagComments'=> $flagComments
        ]);
    }
}