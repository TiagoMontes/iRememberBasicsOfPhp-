<?php

require_once '../src/Controller/UserController.php';
require_once '../vendor/autoload.php';

use App\Controller\UserController;

$requestUri = str_replace('/myWebsite', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$requestMethod = $_SERVER['REQUEST_METHOD'];

$routes = [
    'GET' => [
        '/' => function() {
            require '../pages/index.php';
        }
    ],
    'POST' => [
        '/user/submit' => [UserController::class, 'handleFormSubmission']
    ]
];

if (isset($routes[$requestMethod][$requestUri])) {
    $route = $routes[$requestMethod][$requestUri];
    if (is_callable($route)) {
        $route();
    } else {
        $controller = new $route[0];
        $method = $route[1];
        $controller->$method();
    }
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}
