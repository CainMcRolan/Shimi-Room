<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    "/" => base_path("src/controllers/login.controller.php"),
    "/login" => base_path("src/controllers/login.controller.php"),
    "/register" => base_path("src/controllers/register.controller.php"),
    "/home" => base_path("src/controllers/home.controller.php"),
    "/calculator" => base_path("src/controllers/calculator.controller.php"),
    "/quiz-multiple" => base_path("src/controllers/quiz-multiple.controller.php"),
    "/quiz-identify" => base_path("src/controllers/quiz-identify.controller.php"),
    "/stopwatch" => base_path("src/controllers/stopwatch.controller.php"),
];

function routeToController($routes, $uri) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else{
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    require base_path("src/views/{$code}.php");

    die();
}

routeToController($routes, $uri);