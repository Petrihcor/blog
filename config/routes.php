<?php

use App\Router;
use Src\HomeController;
use Src\LoginController;
use Src\RegistrationController;
use Src\UsersController;
use Src\PostController;

$route = new Router();


//какой же это костыль
//$id = null;
//if (!empty($_GET)) {
//    $id = $_GET['id'];
//}

$route
    ->add('GET', '/', [HomeController::class, 'index'])
    ->add('GET', '/posts', [PostController::class, 'showPosts'])
    ->add('GET', '/users', [UsersController::class, 'index'])
    ->add('GET', "/user/{id}", [UsersController::class, 'showUser'])
    ->add('GET', '/login', [LoginController::class, 'index'])
    ->add('POST', '/login', [LoginController::class, 'login'])
    ->add('GET', '/logout', [LoginController::class, 'logout'])
    ->add('GET', '/registration', [RegistrationController::class, 'index'])
    ->add('POST', '/registration', [RegistrationController::class, 'register'])
    ->add('GET', '/create-post', [PostController::class, 'index'])
    ->add('POST', '/add-post', [PostController::class, 'addPost'])
    ;

return $route;