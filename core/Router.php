<?php

namespace App;

class Router
{
    private array $routes;

    public function add(string $method, string $path, array $handle) :self
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handle'=> $handle
        ];
        return $this;
    }

    public function dispatch(string $method, string $path) :void
    {
        foreach ($this->routes as $route) {
            if ($route['method'] == $method && $route['path'] == $path){
                $controller = new $route['handle'][0]();
                $action = $route['handle'][1];
                $controller->$action();
                return;
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }


}