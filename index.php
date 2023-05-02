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

$router->map('GET', '/users/list', function () {
    $array = [
        ['email' => 'paul@logo.fr', 'first' => 'Paul', 'last' => 'Logo', 'password' => 'user'],
        ['email' => 'marc@coco.com', 'first' => 'Marc', 'last' => 'Coco', 'password' => 'user'],
        ['email' => 'sandy@dob.com', 'first' => 'Sandy', 'last' => 'Dob', 'password' => 'user'],
        ['email' => 'adri@merc.fr', 'first' => 'Adri', 'last' => 'Merc', 'password' => 'user'],
        ['email' => 'anny@marsy.fr', 'first' => 'Anny', 'last' => 'Marsy', 'password' => 'user']
    ];

    $db = new PDO('mysql:host=localhost;dbname=super-week;charset=utf8;port=3307', 'root', '');
    var_dump($db);

    $sql = "INSERT INTO `user` (`email`,`first_name`,`last_name`,`password`) 
    VALUE (?,?,?,?)";
    $request = $db->prepare($sql);

    foreach ($array as $key) {

        var_dump($key);
        $request->execute(array($key['email'], $key['first'], $key['last'], password_hash($key['password'], PASSWORD_DEFAULT)));
    }
}, 'users-bdd');

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
