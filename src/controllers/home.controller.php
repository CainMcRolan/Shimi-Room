<?php

session_start();

require "src/data/projects.php";
$trace = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (!$_SESSION['user']) {
    header("Location: /login");
    exit();
} else {
    $user = $_SESSION['user'];
}

require 'src/views/home.view.php';
