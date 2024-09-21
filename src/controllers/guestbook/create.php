<?php

//Initiate Session
session_start();

//Include Classes
use Core\Database;
use Core\Validator;

//Connect to Database
$config = require base_path("config.php");
$db = new Database($config['database']);

//Declare Errors Variables
$errors = [];

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
    $_SESSION['errors'] = [];
} else {
    $_SESSION['errors'] = $errors;
}

header("location: /guest");
exit();



