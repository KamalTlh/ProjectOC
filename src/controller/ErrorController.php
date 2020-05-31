<?php
namespace App\src\controller;
use App\src\model\View;

class ErrorController{
    private $view;

    public function __construct(){
        $this->view = new View();
    }

    public function errorPage(){
        return $this->view->render('error404', []);
    }

    public function errorServer(){
        return $this->view->render('error500', []);
    }
}