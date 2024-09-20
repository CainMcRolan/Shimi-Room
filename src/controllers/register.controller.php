<?php

use Core\Database;
use Core\Validator;

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Register",
    "description" => "Create an account here and then we'll talk!😤",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $errors = [];

    if (!Validator::string($password, 5, INF)) {
        $errors['body'] = 'password cannot be shorter than 5 characters';
    }

    if (!Validator::string($username)) {
        $errors['body'] = 'username cannot be shorter than 5 characters';
    }

    if (empty($errors)) {
        $config = require base_path("config.php");
        $db = new Database($config['database']);

        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = $db->query("select * from users where username = :username", [':username' => $username])
            ->get();

        if ($result) {
            $errors['body'] = 'user already exists';
        } else {
            $db->query("insert into users (username, password) values (:username, :password)", [':username' =>
                $username, ':password' => $password]);
            header("Location: /login");
            exit();
        }
    }

}

require base_path('src/views/register.view.php');
