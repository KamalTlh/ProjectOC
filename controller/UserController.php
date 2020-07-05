<?php
namespace controller;

class UserController extends Controller{

    public function createUser($post){
        if(isset($post['submit'])){
            $errors = $this->validation->validate($post, 'User');
            if($this->userModel->isPseudoUnique($post, '')){
                $errors['pseudo'] = $this->userModel->isPseudoUnique($post, '');
            }
            if($this->userModel->isEmailUnique($post, '')){
                $errors['email'] = $this->userModel->isEmailUnique($post, '');
            }
            if(!($errors)){
                $this->userModel->createUser($post);
                if($this->session->get('role') === 'admin'){
                    $this->session->set('account_created', 'Le compte a été crée.');
                    header('Location: index.php?route=administration');
                }
                else{
                $this->session->set('first_login', 'Vous pouvez vous connectez');
                header('Location: index.php?route=login');
                }
            }
            return $this->view->render('createuser',[
                'post'=> $post,
                'errors'=> $errors
            ]);
        }
        return $this->view->render('createuser');
    }

    public function readUser($userId){
        if($this->checkLoggedIn()){
            $user = $this->userModel->getUser($userId);
            return $this->view->render('profile', [
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
                    if ($this->session->get('role') === 'admin'){
                        $this->session->set('user_updatedByAdmin', 'Les informations de l\'utilisateur ont été mis à jour.');
                        header('Location: index.php?route=administration');
                    }
                    else{
                        $this->session->set('user_updated', 'Vos informations ont été mises à jour.');
                        header('Location: index.php');
                    }
                }
                return $this->view->render('profile',[
                    'post'=> $post,
                    'userId' => $userId,
                    'user' => $user,
                    'errors'=> $errors
                ]);
            }
        }
    }

    public function updatePassword($post, $userId){
        if($this->checkLoggedIn()){
            if(isset($post['submit'])){
                $errors = $this->validation->validate($post, 'User');
                if( $post['password'] && $post['password'] === $post['verified_password']){
                    $this->userModel->updatePassword($post, $userId);
                    $this->session->set('password_updated', 'Le mot de passe a été mis à jour.');
                    header('Location: index.php?route=profile&userId='.$userId);
                }
                $this->session->set('error_password', 'Les mots de passe ne correspondent pas.');
                return $this->view->render('updatepassword', [
                    'userId' => $userId,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('updatepassword', [
                'userId' => $userId
            ]);
        }
    }

    public function deleteUser($userId){
        if($this->checkLoggedIn()){
            $this->userModel->deleteUser($userId);
            $this->logoutOrDelete('delete');
        }
    }

    public function login($post){
        if(isset($post['submit'])){
            $errors = $this->validation->validate($post, 'User');
            $result = $this->userModel->login($post);
            $role = $this->userModel->checkUserRole($post['userlog']);
            if($result && $result['isPasswordValid']){
                $this->session->set('login', 'Content de vous revoir !');
                $this->session->set('user_id', $result['result']['id'] );
                $this->session->set('pseudo', $result['result']['pseudo'] );
                $this->session->set('userlog', $post['userlog']);
                $this->session->set('role', $role['result']);
                header('Location: index.php');
            }
            $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects.');
            return $this->view->render('login', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('login');
    }
    public function logout(){
        $this->logoutOrDelete('logout');
    }

    public function logoutOrDelete($type){
        if($type === 'logout'){
            $this->session->stop();
            $this->session->start();
            $this->session->set('logout', 'Vous êtes déconnecté, à bientôt');
            header('Location: index.php');
        }
        else{
            if($this->session->get('role') === 'admin'){
                $this->session->set('account_delete', 'Le compte a été supprimé');
                header('Location: index.php?route=administration');
            }
            else{
                $this->session->stop();
                $this->session->start();
                $this->session->set('account_delete', 'Votre compte a été supprimé');
                header('Location: index.php');
            }
        }
    }

    public function profile($userId){
        if($this->checkLoggedIn()){
            $user = $this->userModel->getUser($userId);
            return $this->view->render('profile', [
                'user' => $user
            ]);
        }
    }

    public function administration(){
        if($this->checkLoggedIn() && $this->checkAdmin()){
            $articles = $this->articlesModel->getListArticles();
            $comments = $this->commentsModel->getListComments();
            $flagComments = $this->commentsModel->getFlagComments();
            $users = $this->usersModel->getListUsers();
            return $this->view->render('admin/administration', [
                'articles'=> $articles,
                'comments' => $comments,
                'flagComments'=> $flagComments,
                'users'=> $users
            ]);
        }
    }
}