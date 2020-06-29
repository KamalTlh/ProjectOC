<?php
namespace constraint;

class Validation{
    public function validate($data, $name){
        if($name === 'Article'){
            $articleValidation = new ArticleValidation();
            $errors = $articleValidation->check($data);
        }
        elseif($name === 'Comment'){
            $commentValidation = new CommentValidation();
            $errors = $commentValidation->check($data);
        }
        elseif($name === 'User'){
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
        }
        return $errors;
    }
}