<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\RegisterForm;

$form = RegisterForm::validate($attributes = ['username' => $_POST['username'], 'password' => $_POST['password']]);

$signed_in = (new Authenticator())->register_attempt($attributes['username'], $attributes['password']);

if (!$signed_in) {
    $form->error('body', 'user already exists')->throw();
}

Session::flash('success', 'Account registered successfully.');
redirect('/login');
