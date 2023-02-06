<?php
const  BASE_PATH =__DIR__ . '/../';

require BASE_PATH . 'core/functions.php';

spl_autoload_register(function ($class){
    //core\Database
    $classpath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$classpath}.php");
});

require base_path('bootstrap.php');

$router = new \core\router();

$routes =require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);





