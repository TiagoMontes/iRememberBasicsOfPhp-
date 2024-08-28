<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
$routes = require_once dirname(__DIR__) . '/config/routes.php';

use App\Core\Router;

$requestUri = str_replace('/myWebsite', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router = new Router($routes);
$router->handleRequest($requestMethod, $requestUri);