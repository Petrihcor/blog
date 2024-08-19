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

            // Я не понимаю, что это
            $pattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $route['path']);
            $pattern = str_replace('/', '\/', $pattern);


            if ($route['method'] === $method && preg_match('/^' . $pattern . '$/', $path, $matches)) {
                array_shift($matches); // Удаляем первый элемент, который является полным совпадением

                $controller = new $route['handle'][0]();  // Создаем объект контроллера
                $action = $route['handle'][1];            // Определяем метод контроллера
                $controller->$action(...$matches);        // Вызываем метод контроллера с параметрами
                return;
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }


}