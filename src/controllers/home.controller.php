<?php

use Core\Validator;

session_start();

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Home",
    "description" => "welcome back " . Validator::verify_user($_SESSION['user']) .  "! where did u go? i was bored so i added some program that you might not have seen yet😃, check them out!!!",
];

require base_path("src/data/projects.php");

require base_path('src/views/home.view.php');
