<?php

require '../config/DataDB.php';
require '../config/Autoloader.php';
use \App\config\Autoloader;
Autoloader::register();

$router = new \App\config\Router();
$router->run();
