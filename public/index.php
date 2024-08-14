<?php

require_once dirname(__DIR__) . '/bootstrap.php';
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
    $callback = $routes[$requestMethod][$requestUri];
    if (is_callable($callback)) {
        $callback();
    } else {
        [$class, $method] = $callback;
        (new $class)->$method();
    }
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}
