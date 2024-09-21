<?php

//Initiate Session
session_start();

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

//Declare Comments Variables
$username = $_SESSION['user'] ?? '';
$user = $db->query("select * from users where username = :username", [":username" => $username])->find();
$comments = [];
$errors = $_SESSION['errors'] ?? [];

//Handle comments display
$comments = $db->query("select * from notes")->get();

require base_path('src/views/guestbook/index.php');
