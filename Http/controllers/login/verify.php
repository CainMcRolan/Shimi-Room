<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'username' => $_POST['username'],
    'password' => $_POST['password'],
]);

$signed_in = (new Authenticator())->login_attempt($attributes['username'], $attributes['password']);

if (!$signed_in) {
    $form->error('body', 'Invalid Credentials.')->throw();
}

redirect('/home');

