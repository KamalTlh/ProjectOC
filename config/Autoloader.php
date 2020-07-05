<?php
namespace config;

class Autoloader{

    /**
        * Enregistre notre autoloader
    */
    public static function register(){
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    /**
        * Inclue le fichier correspondant à notre classe
        * @param $class string Le nom de la classe à charger
    */
    public static function autoload($class){
        $class = str_replace('\\', '/', $class);
        require $class.'.php';
    }
}
