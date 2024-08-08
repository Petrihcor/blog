<?php

use App\Router;
use Src\HomeController;
use Src\LoginController;
use Src\RegistrationController;
use Src\UsersController;

$route = new Router();


$route
    ->add('GET', '/', [HomeController::class, 'index'])
    ->add('GET', '/users', [UsersController::class, 'index'])
    ->add('GET', '/user', [UsersController::class, 'showUser'])
    ->add('GET', '/login', [LoginController::class, 'index'])
    ->add('POST', '/login', [LoginController::class, 'login'])
    ->add('GET', '/logout', [LoginController::class, 'logout'])
    ->add('GET', '/registration', [RegistrationController::class, 'index'])
    ->add('POST', '/registration', [RegistrationController::class, 'register'])
    ;

return $route;