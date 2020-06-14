<?php
namespace App\controller;

class UserController extends Controller{

    public function login(){
        $this->view->render('login', []);
    }

    public function createUser($post){
        if(isset($post['submit'])){
            $errors = $this->validation->validate($post, 'User');
            if(!($errors)){
                $this->userModel->createUser($post);
                header('Location: ../public/index.php');
            }
            return $this->view->render('CreateUser',[
                'post'=> $post,
                'errors'=> $errors
            ]);
        }
        return $this->view->render('CreateUser');
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
            header('Location: ../public/index.php?route=Administration');
        }
        return $this->view->render('UpdateUser',[
            'user'=> $user
        ]);
    }

    public function deleteUser($userId){
        $this->userModel->deleteUser($userId);
        $this->session->set('delete_user', 'L\'utlisateur a bien été supprimé.');
        header('Location: ../public/index.php?route=Administration'); 
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