<?php

use Core\Session;

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Login",
    "description" => "You are currently not logged in! Enter your authentication credentials below to log in. Enable Cookies please!",
];

$errors = Session::get('errors') ?? [];
$success = Session::get('success') ?? '';
$username = Session::get('username') ?? '';

require base_path('Http/views/login.view.php');