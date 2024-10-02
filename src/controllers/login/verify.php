<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$username = $_POST['username'];
$password = $_POST['password'];
$errors = [];

if (!Validator::string($password)) {
    $errors['body'] = "password enter a valid password";
}

if (!Validator::string($username)) {
    $errors['body'] = "please enter a valid username.";
}

if (! empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('location: /login');
    exit();
}

$users = $db->query("select * from users where username = :username", [':username' => $username])->find();

if ($users) {
    if (password_verify($password, $users['password'])) {
        $_SESSION['user'] = $username;
        session_regenerate_id(true);
        header("Location: /home");
        exit();
    } else {
        $errors['body'] = "wrong password";
    }
} else {
    $errors['body'] = "user does not exist";
}

$_SESSION['errors'] = $errors;
header('location: /login');
exit();