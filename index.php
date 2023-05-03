<?php

use App\Controller\UserController;

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

$router->map('GET', '/users/create', function () {
    $userController = new UserController;
    $userController->fillDB();
}, 'users-bdd');

$router->map('GET', '/book/create', function () {
    $array2 = [
        ['title' => 'Ronron', 'content' => 'Ronflex', 'id_user' => 2],
        ['title' => 'Coco', 'content' => 'Musique', 'id_user' => 4],
        ['title' => 'Dodo', 'content' => 'Berceuse', 'id_user' => 1],
        ['title' => 'Toto', 'content' => 'blague', 'id_user' => 5],
        ['title' => 'Cheval', 'content' => 'Animal', 'id_user' => 3],
        ['title' => 'Lampe', 'content' => 'Lumière', 'id_user' => 4]
    ];

    $db = new PDO('mysql:host=localhost;dbname=super-week;charset=utf8;port=3307', 'root', '');

    $sql = "INSERT INTO `book` (`title`,`content`,`id_user`) 
    VALUE (?,?,?)";
    $request = $db->prepare($sql);

    foreach ($array2 as $book) {
        $request->execute(array($book['title'], $book['content'], $book['id_user']));
    }
}, 'book-bdd');

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
