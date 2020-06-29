<?php
namespace controller;

class ArticleController extends Controller{

    public function home(){
        $articles = $this->articlesModel->getListArticles();
        return $this->view->render('home',[
            'articles'=>$articles
        ]);
    }

    public function article(){
        $article = $this->articleModel->getArticle($_GET['articleId']);
        $comments = $this->commentsModel->getCommentsFromArticle($_GET['articleId']);
        return $this->view->render('readarticle',[
            'article'=>$article,
            'comments'=>$comments
        ]);
    }

    public function addArticle($post){
        if($this->checkAdmin()){
            if(isset($post['submit'])){
                $errors = $this->validation->validate($post, 'Article');
                if(!($errors)){
                    $this->articleModel->addArticle($post);
                    $this->session->set('add_article', 'Le nouvel article a bien été ajouté');
                    header('Location: index.php');
                }
                return $this->view->render('createarticle', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('createarticle');
        }
    }

    public function updateArticle($post, $articleId){
        if($this->checkAdmin()){
            $article = $this->articleModel->getArticle($articleId);
            if(isset($post['submit'])){
                $errors = $this->validation->validate($post, 'Article');
                if(!($errors)){
                    $this->articleModel->updateArticle($post, $articleId);
                    $this->session->set('update_article', 'L\'article a bien été modifié');
                    header('Location: index.php?route=administration');
                }
                return $this->view->render('updatearticle', [
                    'article'=>$article,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('updatearticle', [
                'article'=>$article
            ]);
        }
    }

    public function deleteArticle($articleId){
        if($this->checkAdmin()){
            $this->articleModel->deleteArticle($articleId);
            $this->session->set('delete_article', 'L\'article a bien été supprimé');
            header('Location: index.php?route=administration');
        }
    }
}