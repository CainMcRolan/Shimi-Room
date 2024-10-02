<?php

use Core\Session;

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Register",
    "description" => "Create an account here and then we'll talk!😤",
];

$errors = Session::get('errors') ?? [];
$username = Session::get('username') ?? '';

require base_path('Http/views/register.view.php');