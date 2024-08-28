<?php

use App\Controller\UserController;

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

return $routes;