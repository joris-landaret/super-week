<?php

require_once 'vendor/autoload.php';

$router = new AltoRouter();

$router->map('GET', '/', function () {
    echo 'Bienvenu sur l\'accueil';
});
