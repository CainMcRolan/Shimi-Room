<?php

use Core\Repository\Guestbook;

(new Guestbook())->guestbook_delete($_POST['delete_id']);

redirect('/guest');