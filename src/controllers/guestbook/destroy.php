<?php

//Initiate Session
session_start();

//Include Classes
use Core\Database;

//Connect to Database
$config = require base_path("config.php");
$db = new Database($config['database']);

//Handle Comment Deletion
$delete_id = $_POST['delete_id'];
$comment = $db->query("select * from notes where id = :id", [":id"=>$delete_id])->find();

$user = $db->query("select * from users where username = :username", [":username" => $_SESSION['user']])->find();

if ($comment && $comment['user_id'] === $user['id']) {
    $db->query("DELETE FROM notes WHERE id = :delete_id", [":delete_id" => $delete_id]);
}

header("location: /guest");
exit();
