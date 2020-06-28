<?php
namespace view;
use config\Session;

class View{
    private $title;
    private $file;
    private $session;
    
    public function __construct(){
        $this->session = new Session($_SESSION);
    }

    public function render($template, $data=[]){
        if( $template === 'administration'){
            $template = 'admin/administration.php';
        }
        $this->file = 'view/'.$template.'.php';
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('view/base.php', [
            'title' => $this->title,
            'content' => $content,
            'session' => $this->session
        ]);
        echo $view;
    }

    private function renderFile($file, $data){
        try{
            if(file_exists($file)){
                extract($data);
                ob_start();
                require $file;
                return ob_get_clean();
            }
        }
        catch (Exception $e){
            $notFound = new ErrorController();
            $notFound->errorPage();      
        }
    }
}