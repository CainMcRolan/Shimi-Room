<?php

use Core\Session;
use Http\models\Guestbook;

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Welcome to the Guest Book",
    "description" => "",
];
$project_info = [
    "creation_date" => "20/09/24 21:18",
    "last_modified" => "20/09/24 21:18",
    "author" => "Shimi Jallores",
    "tags" => ["guest", "notes", "comment", "message"],
];

$model = new Guestbook();

$username = $_SESSION['user'] ?? '';
$comment = $model->get_comment($_GET['id']);

authorize($comment['username'] === $username);

$user = $model->get_user($username);
$comments = $model->get_comments();

$errors = Session::get('errors') ?? [];

require base_path('Http/views/guestbook/edit.php');


