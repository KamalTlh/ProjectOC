<?php

namespace App\config;
use Exception;

class Router{
    public function run(){
        try{
            if(isset($_GET['route'])){
                if($_GET['route'] === 'article'){
                    require '../templates/single.php';
                }
                elseif($_GET['route'] === 'addArticle'){
                    require '../templates/Add_article.php';
                }
                else{
                    echo 'page inconnue';
                }
            }
            else{
                require '../templates/home.php';
            }
        }
        catch (Exception $e){
            echo 'Erreur: '.$e;
        }
    }
}