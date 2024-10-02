<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

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


