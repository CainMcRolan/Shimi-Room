<?php

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Register",
    "description" => "Create an account here and then we'll talk!😤",
];

$errors = $_SESSION['errors'] ?? [];

require base_path('Http/views/register.view.php');