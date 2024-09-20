<?php

//Initiate Session
session_start();

//Include Classes
use Core\Database;
use Core\Validator;

//Connect to Database
$config = require base_path("config.php");
$db = new Database($config['database']);

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
$errors = [];
$user = $db->query("select * from users where username = :username", [":username" => $username])->find();
$comments = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    //Handle Insertion of new Comment
    //Get Form Data
    $name = $_SESSION['user'] ?? $_POST['username'];
    $comment = $_POST['comment'];

    //Validate Form Data
    if (!Validator::string($name)) {
        $errors['body'] = "Name has to be at least 5 characters";
    }

    if (!Validator::string($comment, 5, 200)) {
        $errors['body'] = "Comments cannot be less than 5 characters and more than 200 characters";
    }

    //Insert into Database
    if (empty($errors)) {
        $user = $db->query("select * from users where username = :username", [":username" => $name])->find();
        $user_id = $user['id'] ?? null;

        $db->query("insert into notes (username, comment, user_id) values(:username, :comment, :user_id)", [":username" => $name, ":comment" => $comment, ":user_id" => $user_id]);

        header("location: /guest");
        exit();
    }
}

//Handle Comment Deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $comment = $db->query("select * from notes where id = :id", [":id"=>$delete_id])->find();

    $user = $db->query("select * from users where username = :username", [":username" => $username])->find();

    if ($comment && $comment['user_id'] === $user['id']) {
        $db->query("DELETE FROM notes WHERE id = :delete_id", [":delete_id" => $delete_id]);
    }

    header("location: /guest");
    exit();
}

//Handle comments display
$comments = $db->query("select * from notes")->get();

require base_path('src/views/guestbook/index.php');
