<?php

use Core\App;
use Core\Authenticator;
use Http\Forms\RegisterForm;
use Core\Database;

$username = $_POST['username'];
$password = $_POST['password'];

$form = new RegisterForm();

$db = App::resolve(Database::class);

if ($form->validate($username, $password)) {
    if ((new Authenticator())->register_attempt($username, $password)) {
        $_SESSION['errors'] = [];
        redirect('/login');
    }
    $form->error('body', 'user already exists');
}

$_SESSION['errors'] = $form->get_errors();
redirect('/register');