<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$username = $_POST['username'];
$password = $_POST['password'];

$form = new LoginForm();

if (! $form->validate($username, $password)) {
    $_SESSION['errors'] = $form->get_errors();
    header('location: /login');
    exit();
}

$errors = $form->get_errors();

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