<?php
require 'config/Datadb.php';
require 'config/Autoloader.php';
use config\Autoloader;
Autoloader::register();
session_start();
$router = new \controller\Router();
$router->run();
