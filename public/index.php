<?php

use Core\Router;
use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

//psr4 composer autoloader
require base_path("vendor/autoload.php");

require base_path("bootstrap.php");

//Routing purposes
$router = new Router();
$routes = require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

//Redirect After failed validation (Catch the exception thrown by validation errors)
try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    redirect($router->previous_url());
}

Session::unflash();

