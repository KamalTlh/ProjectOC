<?php
namespace App\view;

class View{
    private $title;
    private $file;

    public function render($template, $data=[]){
        $this->file = '../view/'.$template.'.php';
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../view/base.php', [
            'title' => $this->title,
            'content' => $content
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