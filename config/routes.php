<?php

use App\Router;
use Src\HomeController;

$route = new Router();


$route
    ->add('GET', '/', [HomeController::class, 'execute'])
    ;

return $route;