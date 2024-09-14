<?php

session_start();

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Stopwatch",
    "description" => "tick tock tick tock, hurry up its a 🚫⌚",
    "sub_dir" => '/home',
];

Validator::verify_user($_SESSION['user']);

require base_path('src/views/stopwatch.view.php');
