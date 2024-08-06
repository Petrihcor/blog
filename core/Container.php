<?php

namespace App;


class Container
{


    public function __construct()
    {
        $route = require_once __DIR__ . '/../config/routes.php';
        $route->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    }
}