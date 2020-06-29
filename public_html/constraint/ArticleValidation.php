<?php
namespace constraint;

class ArticleValidation extends Validation{

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
        if($name === 'title'){
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        }
        elseif($name === 'content'){
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

    private function checkTitle($name, $value){
        if($this->constraint->notEmpty($name, $value)){
            return $this->constraint->notEmpty('titre', $value);
        }
        if($this->constraint->minLength($name, $value, 2)){
            return $this->constraint->minLength('titre', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)){
            return $this->constraint->maxLength('titre', $value, 255);
        }
    }

    private function checkContent($name, $value){
        if($this->constraint->notEmpty($name, $value)){
            return $this->constraint->notEmpty('contenu', $value);
        }
        if($this->constraint->minLength($name, $value, 9)){
            return $this->constraint->minLength('contenu', $value, 9);
        }
    }
}