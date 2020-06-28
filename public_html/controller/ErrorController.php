<?php
namespace controller;

class ErrorController extends Controller{

    public function errorPage(){
        return $this->view->render('error404', []);
    }

    public function errorServer(){
        return $this->view->render('error500', []);
    }
}