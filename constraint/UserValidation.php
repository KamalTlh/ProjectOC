<?php
namespace App\constraint;

class UserValidation extends Validation{

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
        if($name === 'pseudo'){
            $error = $this->checkPseudo($name, $value);
            $this->addError($name, $error);
        }
        elseif($name === 'password'){
            $error = $this->checkPassword($name, $value);
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

    private function checkPseudo($name, $value){
        if($this->constraint->notEmpty($name, $value)){
            return $this->constraint->notEmpty('pseudo', $value);
        }
        if($this->constraint->minLength($name, $value, 2)){
            return $this->constraint->minLength('pseudo', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)){
            return $this->constraint->maxLength('pseudo', $value, 255);
        }
    }

    private function checkPassword($name, $value){
        if($this->constraint->notEmpty($name, $value)){
            return $this->constraint->notEmpty('password', $value);
        }
        if($this->constraint->minLength($name, $value, 2)){
            return $this->constraint->minLength('password', $value, 9);
        }
    }
}