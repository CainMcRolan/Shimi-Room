<?php

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Login",
    "description" => "You are currently not logged in! Enter your authentication credentials below to log in. Enable Cookies please!",
];

$errors = $_SESSION['errors'] ?? [];

require base_path('src/views/login.view.php');