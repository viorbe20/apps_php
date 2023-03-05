<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Core\Router;
use App\Controllers\DefaultController;
use App\Controllers\RecetasController;
use App\Controllers\AdminController;



session_start();

$tiempo_inactivo = 300; //5 minutos 

// Verifica si existe una variable de sesión "último acceso"
if (isset($_SESSION['ultimo_acceso'])) {
    
    // Calcula la diferencia de tiempo entre el último acceso y el tiempo actual
    $tiempo_transcurrido = time() - $_SESSION['ultimo_acceso'];

    // Compara el tiempo transcurrido con el tiempo de inactividad permitido
    if ($tiempo_transcurrido > $tiempo_inactivo) {
        
        // Si el tiempo transcurrido es mayor al tiempo de inactividad permitido, destruye la sesión y redirige al usuario a la página de inicio de sesión
        unset($_SESSION);
        session_destroy();
        header('Location: ' . DIRBASEURL . "/home");
        exit;
    }
}

// Actualiza la variable de sesión "último acceso" con el tiempo actual
$_SESSION['ultimo_acceso'] = time();


//Always open session as guest
if (!isset($_SESSION['user']['profile'])) {
    $_SESSION['user']['profile'] = "guest";
    $_SESSION['user']['username'] = "invitado";
    $_SESSION['user']['status'] = "logout"; 
}

$router = new Router();


$router->add(array(
    'name' => 'pagos',
    'path' => '/^\/pagos$/',
    'action' => [AdminController::class, 'pagosAction'],
    'auth' => ["admin"]
));

$router->add(array(
    'name' => 'usuarios bloquear',
    'path' => '/^\/usuarios\/bloquear\/\d{1,3}$/',
    'action' => [AdminController::class, 'bloquearUsuarioAction'],
    'auth' => ["admin"]
));

$router->add(array(
    'name' => 'usuarios desbloquear',
    'path' => '/^\/usuarios\/desbloquear\/\d{1,3}$/',
    'action' => [AdminController::class, 'desbloquearUsuarioAction'],
    'auth' => ["admin"]
));

$router->add(array(
    'name' => 'usuarios',
    'path' => '/^\/usuarios$/',
    'action' => [AdminController::class, 'usuariosAction'],
    'auth' => ["admin"]
));

//Mis recetas page
$router->add(array(
    'name' => 'mis recetas',
    'path' => '/^\/mis_recetas$/',
    'action' => [RecetasController::class, 'misRecetasAction'],
    'auth' => ["user"]
));


//Publicaciones page
$router->add(array(
    'name' => 'publicaciones',
    'path' => '/^\/publicaciones$/',
    'action' => [RecetasController::class, 'publicacionesAction'],
    'auth' => ["user, colab, guest"]
));


//Home page
$router->add(array(
    'name' => 'home',
    'path' => '/^\/home$/',
    'action' => [DefaultController::class, 'homeAction'],
    'auth' => ["admin, user, colab, guest"]
));

//Log out page
$router->add(array(
    'name' => 'logout',
    'path' => '/^\/logout$/',
    'action' => [DefaultController::class, 'logoutAction'],
    'auth' => ["admin, user, colab"]
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


