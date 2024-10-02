<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$username = $_POST['username'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($username, $password)) {
    if ((new Authenticator())->login_attempt($username, $password)) {
        redirect('/home');
    }

    $form->error('body', 'Invalid Credentials.');
}

$_SESSION['errors'] = $form->get_errors();;
redirect('/login');




