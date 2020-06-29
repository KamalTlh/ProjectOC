<?php
namespace constraint;

class CommentValidation extends Validation{

    private $errors = [];
    private $constraint;

    public function __construct(){
        $this->constraint = new Constraint();
    }

    public function check($post){
        foreach($post as $key => $value){
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value){
        if($name === 'content'){
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error){
        if($error){
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkContent($name, $value){
        if($this->constraint->notEmpty($name, $value)){
            return $this->constraint->notEmpty('contenu', $value);
        }
        if($this->constraint->minLength($name, $value, 3)){
            return $this->constraint->minLength('contenu', $value, 3);
        }
    }
}