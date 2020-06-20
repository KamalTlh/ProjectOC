<?php
namespace App\controller;

class UserController extends Controller{

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
        if($this->checkLoggedIn()){
            $user = $this->userModel->getUser($userId);
            return $this->view->render('Profile', [
                'user'=> $user
            ]);
        }
    }

    public function updateUser($post, $userId){
        if($this->checkLoggedIn()){
            if(isset($post['submit'])){
                $errors = $this->validation->validate($post, 'User');
                $user = $this->userModel->getUser($userId);
                if($this->userModel->isPseudoUnique($post, $userId)){
                    $errors['pseudo'] = $this->userModel->isPseudoUnique($post, $userId);
                }
                if($this->userModel->isEmailUnique($post, $userId)){
                    $errors['email'] = $this->userModel->isEmailUnique($post, $userId);
                }
                if(!($errors)){
                    $this->userModel->updateUser($post, $userId);
                    header('Location: ../public/index.php');
                }
                return $this->view->render('Profile',[
                    'post'=> $post,
                    'userId' => $userId,
                    'user' => $user,
                    'errors'=> $errors
                ]);
            }
        }
    }

    public function deleteUser($userId){
        if($this->checkAdmin()){
            $this->userModel->deleteUser($userId);
            $this->session->set('delete_user', 'L\'utlisateur a bien été supprimé.');
            header('Location: ../public/index.php?route=Administration');
        }
    }

    public function updatePassword($post, $userId){
        if($this->checkLoggedIn()){
            if(isset($post['submit'])){
                $errors = $this->validation->validate($post, 'User');
                if( $post['password'] && $post['password'] === $post['verified_password']){
                    $this->userModel->updatePassword($post, $userId);
                    header('Location: ../public/index.php');
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
    }

    public function login($post){
        if(isset($post['submit'])){
            $result = $this->userModel->login($post);
            $role = $this->userModel->checkUserRole($post['userlog']);
            if($result && $result['isPasswordValid']){
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('user_id', $result['result']['id'] );
                $this->session->set('pseudo', $result['result']['pseudo'] );
                $this->session->set('userlog', $post['userlog']);
                $this->session->set('role', $role['result']);
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
        if($this->checkLoggedIn()){
            $user = $this->userModel->getUser($userId);
            return $this->view->render('Profile', [
                'user' => $user
            ]);
        }
    }

    public function administration(){
        if($this->checkAdmin()){
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
}