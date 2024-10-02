<?php

use Core\App;
use Core\Authenticator;
use Core\Session;
use Http\Forms\RegisterForm;
use Core\Database;

$username = $_POST['username'];
$password = $_POST['password'];

$form = new RegisterForm();

$db = App::resolve(Database::class);

if ($form->validate($username, $password)) {
    if ((new Authenticator())->register_attempt($username, $password)) {
        Session::flash('success', 'Account registered successfully.');
        redirect('/login');
    }
    $form->error('body', 'user already exists');
}

Session::flash('username', $username);
Session::flash('errors', $form->get_errors());
redirect('/register');