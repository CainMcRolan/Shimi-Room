<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    "/login" => "./src/controllers/login.controller.php",
    "/register" => "./src/controllers/register.controller.php",
    "/home" => "./src/controllers/home.controller.php",
    "/calculator" => "./src/controllers/calculator.controller.php",
    "/quiz" => "./src/controllers/quiz1.php",
    "/quiz2" => "./src/controllers/quiz2.php",
    "/stopwatch" => "./src/controllers/stopwatch.php",
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

    require "./src/views/{$code}.php";

    die();
}

routeToController($routes, $uri);