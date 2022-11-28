<?php

use App\Route\Router;

require 'vendor/autoload.php';

$router = new Router($_GET['url']);

$router->get('/', function () {
    $controller = new \App\Controller\PostController();
    $controller->home();
});


$router->get('/post/:id', function ($id) {
    $controller = new \App\Controller\PostController();
    $controller->post($id);
});

$router->get('/profil/:id', function ($user) {
    $controller = new \App\Controller\PostController();
    $controller->profil($user);
});

$router->get('/users', function () {
    $controller = new \App\Controller\PostController();
    $controller->users();
});

$router->get('/createPost:id', function ($user) {
    $controller = new \App\Controller\PostController();
    $controller->createPost($user);
});

$router->get('/blog', function () {
    $controller = new \App\Controller\PostController();
    $controller->blog();
});


$router->run();
