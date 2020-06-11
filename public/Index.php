<?php

require '../config/DataDB.php';
require '../config/Autoloader.php';
use \App\config\Autoloader;
Autoloader::register();
session_start();
$router = new \App\controller\Router();
$router->run();
