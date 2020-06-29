<?php
namespace config;

class Autoloader{

    public static function register(){
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class){
        $class = str_replace('public_html', '', $class);
        $class = str_replace('\\', '/', $class);
        require $class.'.php';
    }
}