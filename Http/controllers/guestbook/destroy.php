<?php

//Include Classes
use Core\App;
use Core\Database;

//Connect to Database
$db = App::resolve(Database::class);

//Handle Comment Deletion
$delete_id = $_POST['delete_id'];
$comment = $db->query("select * from notes where id = :id", [":id"=>$delete_id])->find();

$user = $db->query("select * from users where username = :username", [":username" => $_SESSION['user']])->find();

if ($comment && $comment['user_id'] === $user['id']) {
    $db->query("DELETE FROM notes WHERE id = :delete_id", [":delete_id" => $delete_id]);
}

header("location: /guest");
exit();
