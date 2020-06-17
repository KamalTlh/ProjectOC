<?php
namespace App\controller;

class UserController extends Controller{

    public function login($post){
        if(isset($post['submit'])){
            $result = $this->userModel->login($post);
            if($result && $result['isPasswordValid']){
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('id', $result['result']['id'] );
                $this->session->set('userlog', $post['userlog']);
                header('Location: ../public/index.php');
            }
            $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects.');
            return $this->view->render('login', [
                'post' => $post,
            ]);
        }
        return $this->view->render('login');
    }

    public function logout(){
        $this->session->stop();
        $this->session->set('logout', 'Vous êtes déconnecté, à bientôt.');
        header('Location: ../public/index.php');
    }

    public function profile($userId){
        $user = $this->userModel->getUser($userId);
        return $this->view->render('Profile', [
            'user' => $user
        ]);
    }

    public function createUser($post){
        if(isset($post['submit'])){
            $errors = $this->validation->validate($post, 'User');
            if($this->userModel->isPseudoUnique($post)){
                $errors['pseudo'] = $this->userModel->isPseudoUnique($post);
            }
            if($this->userModel->isEmailUnique($post)){
                $errors['email'] = $this->userModel->isEmailUnique($post);
            }
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
        return $this->view->render('Profile', [
            'user'=> $user
        ]);
    }

    public function updateUser($post, $userId){
        if(isset($post['submit'])){
            $this->userModel->updateUser($post, $userId);
            header('Location: ../public/index.php');
        }
    }

    public function deleteUser($userId){
        $this->userModel->deleteUser($userId);
        $this->session->set('delete_user', 'L\'utlisateur a bien été supprimé.');
        header('Location: ../public/index.php?route=Administration'); 
    }

    public function updatePassword($post, $userId){
        if(isset($post['submit'])){
            $errors = $this->validation->validate($post, 'User');
            if( $post['password'] === $post['verified_password']){
                $this->userModel->updatePassword($post, $userId);
            }
            $this->session->set('error_password', 'Les mots de passe ne correspondent pas.');
            return $this->view->render('Updatepassword', [
                'userId' => $userId,
                'errors' => $errors
            ]);
        }
        return $this->view->render('UpdatePassword', [
            'userId' => $userId
        ]);
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