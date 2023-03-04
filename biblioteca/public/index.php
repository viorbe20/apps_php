<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Core\Router;
use App\Controllers\DefaultController;
use App\Controllers\ObrasController;

session_start();

//Always open session as guest
if (!isset($_SESSION['user']['profile'])) {
    $_SESSION['user']['profile'] = "guest"; //admin, user, employee, guest
    $_SESSION['user']['username'] = "invitado";
    $_SESSION['user']['status'] = "logout"; //login
    
}

$router = new Router();

//Home page
$router->add(array(
    'name' => 'obras',
    'path' => '/^\/obras$/',
    'action' => [ObrasController::class, 'obrasAction'],
    'auth' => ["user, guest, employee"]
));

//Home page
$router->add(array(
    'name' => 'home',
    'path' => '/^\/home$/',
    'action' => [DefaultController::class, 'homeAction'],
    'auth' => ["admin, user, guest, employee"]
));


//Log out page
$router->add(array(
    'name' => 'logout',
    'path' => '/^\/logout$/',
    'action' => [DefaultController::class, 'logoutAction'],
    'auth' => ["admin, user"]
));

//Test page
$router->add(array(
    'name' => 'test',
    'path' => '/^\/test$/',
    'action' => [DefaultController::class, 'testAction'],
    'auth' => ["admin, user"]
));


$request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "No route matched";
}


