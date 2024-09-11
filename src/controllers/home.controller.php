<?php

session_start();

require base_path("src/data/projects.php");
$trace = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$user = Validator::verify_user($_SESSION['user']);

require base_path('src/views/home.view.php');
