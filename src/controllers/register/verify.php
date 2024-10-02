<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$username = $_POST['username'];
$password = $_POST['password'];
$errors = [];

if (!Validator::string($password, 5, INF)) {
    $errors['body'] = 'password cannot be shorter than 5 characters';
}

if (!Validator::string($username)) {
    $errors['body'] = 'username cannot be shorter than 5 characters';
}

if (! empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('location: /register');
    exit();
}

$password = password_hash($password, PASSWORD_DEFAULT);

$result = $db->query("select * from users where username = :username", [':username' => $username])
    ->get();

if ($result) {
    $errors['body'] = 'user already exists';
    $_SESSION['errors'] = $errors;
    header('location: /register');
    exit();
}

$db->query("insert into users (username, password) values (:username, :password)", [':username' => $username, ':password' => $password]);

header("Location: /login");
exit();