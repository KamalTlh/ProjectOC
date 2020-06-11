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
        $articles = $this->articleModel->getListArticles();
        $users = $this->userModel->getListUsers();
        $flagComments = $this->commentModel->getFlagComments();
        
        return $this->view->render('ProfilAdmin', [
            'users'=> $users,
            'articles'=> $articles,
            'flagComments'=> $flagComments
        ]);
    }
}