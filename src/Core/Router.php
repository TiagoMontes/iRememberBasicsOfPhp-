<?php
namespace App\Core;

class Router
{
    protected array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function handleRequest($requestMethod, $requestUri)
    {
        if (isset($this->routes[$requestMethod][$requestUri])) {
            $callback = $this->routes[$requestMethod][$requestUri];
            if (is_callable($callback)) {
                $callback();
            } else {
                [$class, $method] = $callback;
                (new $class)->$method();
            }
        } else {
            $this->sendNotFound();
        }
    }

    public function sendNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
}