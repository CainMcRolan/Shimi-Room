<?php

use Core\Repository\Guestbook;
use Http\Forms\Guest\GuestForm;

$form = GuestForm::validate($attributes = [
    'name' => $_SESSION['user'] ?? $_POST['username'],
    'comment' => $_POST['comment']
]);

if (! (new Guestbook())->guestbook_attempt($attributes['name'], $attributes['comment'])) {
    $form->error('body', 'account already exists')->throw();
}

redirect('/guest');


