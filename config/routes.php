<?php

use App\Router;
use Src\HomeController;
use Src\LoginController;
use Src\RegistrationController;

$route = new Router();


$route
    ->add('GET', '/', [HomeController::class, 'execute'])
    ->add('GET', '/login', [LoginController::class, 'execute'])
    ->add('POST', '/login', [LoginController::class, 'login'])
    ->add('GET', '/logout', [LoginController::class, 'logout'])
    ->add('GET', '/registration', [RegistrationController::class, 'execute'])
    ->add('POST', '/registration', [RegistrationController::class, 'register'])
    ;

return $route;