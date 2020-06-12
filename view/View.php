<?php
namespace App\view;
use App\config\Session;

class View{
    private $title;
    private $file;
    private $session;
    private $section;
    
    public function __construct(){
        $this->session = new Session($_SESSION);
    }

    public function render($template, $data=[]){
        $this->file = '../view/'.$template.'.php';
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../view/base.php', [
            'title' => $this->title,
            'content' => $content,
            'section' => $this->section,
            'session' => $this->session
        ]);
        echo $view;
    }

    private function renderFile($file, $data){
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header('Location:index.php?route=notFound');
    }
}