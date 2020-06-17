<?php
namespace App\constraint;

class Constraint{

    public function notEmpty($name, $value){
        if(empty($value)){
            return '<p><b>Le champ '.$name.' saisi est vide.</b></p>';
        }
    }

    public function minLength($name, $value, $minSize){
        if(strlen($value) < $minSize){
            return '<p><b>Le champ '.$name.' est trop court.</b></p>';
        }
    }

    public function maxLength($name, $value, $maxSize){
        if(strlen($value) > $maxSize){
            return '<p><b>Le champ '.$name.' est trop long.</b></p>';
        }
    }

    public function isEmail($name, $value){
        if ( !(preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $value )) ){
            return '<p><b>Le format '.$name.' est incorrect</b></p>';
        }
    }
}