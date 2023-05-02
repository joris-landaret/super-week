<?php

require_once 'vendor/autoload.php';

$router = new AltoRouter();

//$router->setBasePath('/super-week');

$router->map('GET', '/', function () {
    echo 'Bienvenu sur l\'accueil';
}, 'home');

$router->map('GET', '/users', function () {
    echo 'Bienvenu sur la liste des Utilisateurs.';
}, 'list-users');

$router->map('GET', '/users/[i:id]', function ($id) {
    echo 'Bienvenu sur la page de l\'utilisateur ' . $id;
}, 'id-users');

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
