<?php
namespace constraint;

class Constraint{

    public function notEmpty($name, $value){
        if(empty($value)){
            return '<p><b>Le champ saisi est vide</b></p>';
        }
    }

    public function minLength($name, $value, $minSize){
        if(strlen($value) < $minSize){
            return '<p><b>Le champ saisi doit contenir au moins '.$minSize.' caractères</b></p>';
        }
    }

    public function maxLength($name, $value, $maxSize){
        if(strlen($value) > $maxSize){
            return '<p><b>Le champ saisi doit contenir moins de '.$maxSize.' caractères</b></p>';
        }
    }

    public function isEmail($name, $value){
        if ( !(preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $value )) ){
            return '<p><b>Merci de saisir une adresse email valide</b></p>';
        }
    }
}