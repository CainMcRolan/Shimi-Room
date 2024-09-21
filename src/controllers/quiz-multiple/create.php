<?php

use Core\Database;
use Core\Validator;

session_start();

$config = require base_path("config.php");
$db = new Database($config['database']);

Validator::verify_user($_SESSION['user']);

$score = $_POST['score'] ?? 0;
$time_spent = $_POST['elapsedTime'] ?? '00:00:00';
$username = $_SESSION['user'];

$db->query("INSERT INTO results_multiple (score, username, time) VALUES (:score, :username, :time)", [
    ':score' => $score,
    ':username' => $username,
    ':time' => $time_spent,
]);

header("location: /quiz-multiple");
exit();


