<?php

//Include Classes
use Core\App;
use Core\Database;

//Connect to Database
$db = App::resolve(Database::class);

//Declare Page Information Arrays
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

//Get Current Comment
if (empty($_GET['id'])) {
    header('location: /guest');
    exit();
}
$comment_assoc = $db->query("select * from notes where id = :id", [':id' => $_GET['id']])->find_or_fail();

$username = $_SESSION['user'] ?? '';
$user = $db->query("select * from users where username = :username", [":username" => $username])->find_or_fail();
$comments = [];
$errors = $_SESSION['errors'] ?? [];

//Handle comments display
$comments = $db->query("select * from notes order by id asc")->get();

require base_path('src/views/guestbook/edit.php');
