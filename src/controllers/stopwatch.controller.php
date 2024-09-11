<?php

session_start();

$sub_dir = '/home';
$trace = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (!$_SESSION['user']) {
    header("Location: /login");
    exit();
} else {
    $user = $_SESSION['user'];
}


require base_path('src/views/stopwatch.view.php');
