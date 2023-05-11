<?php

use App\Controller\AuthController;
use App\Controller\BookController;
use App\Controller\UserController;
use Stripe\Terminal\Location;

use function PHPSTORM_META\map;

session_start();

require_once 'vendor/autoload.php';

$router = new AltoRouter();

//$router->setBasePath('/super-week');

$router->map('GET', '/', function () {
    echo 'Bienvenu sur l\'accueil';
    if ($_SESSION['email']) {
        echo ' ' . $_SESSION['first_name'];
    }
}, 'home');

$router->map('GET', '/users', function () {
    echo 'Bienvenu sur la liste des Utilisateurs.';
}, 'users');

$router->map('GET', '/users/[i:id]', function ($id) {
    $authController = new AuthController();
    echo $authController->displayUser($id);
}, 'id-users');

$router->map('GET', '/users/create', function () {
    $userController = new UserController;
    $userController->fillDB();
}, 'users-bdd');

$router->map('GET', '/book/create', function () {
    $bookController = new BookController;
    $bookController->fillDB();
}, 'book-bdd');

$router->map('GET', '/users/list', function () {
    $userController = new UserController;
    echo $userController->list();
}, 'list-users');

$router->map('GET', '/register', function () {
    require_once "src/View/register.php";
}, 'register');

$router->map('POST', '/register', function () {
    $authController = new AuthController();
    $authController->register(...$_POST);
}, 'post-register');

$router->map('GET', '/login', function () {
    require_once "src/View/login.php";
}, 'login');

$router->map('POST', '/login', function () {
    $authController = new AuthController();
    $authController->login(...$_POST);
}, 'post-login');

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
