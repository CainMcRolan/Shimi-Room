<?php

use Core\Repository\Guestbook;
use Http\Forms\Guest\UpdateForm;

$form = UpdateForm::validate($attributes = [
    'comment' => $_POST['comment'],
    'id' => $_POST['id']
]);

(new Guestbook())->guestbook_update($attributes['comment'], $attributes['id']);

redirect('/guest');




