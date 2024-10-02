<?php

//Include Classes
use Core\App;
use Core\Database;
use Core\Validator;

//Connect to Database
$db = App::resolve(Database::class);

//Declare Errors Variables
$errors = [];

//Handle Insertion of new Comment
//Get Form Data
$comment = $_POST['comment'];

if (!Validator::string($comment, 5, 200)) {
    $errors['body'] = "Comments cannot be less than 5 characters and more than 200 characters";
}

//Update and insert into Database
if (empty($errors)) {
    $db->query("update notes set comment = :comment where id = :id", [':comment' => $comment, 'id' => $_POST['id']]);
    $_SESSION['errors'] = [];
    header("location: /guest");
    exit();
} else {
    $_SESSION['errors'] = $errors;
    header("location: /edit?id={$_POST['id']}");
    exit();
}





