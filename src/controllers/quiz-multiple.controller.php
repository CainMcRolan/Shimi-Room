<?php

session_start();

$config = require base_path("config.php");
$db = new Database($config['database']);

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Technical Check-in",
    "description" => "a 10 question multiple-choice timed exam about PHP😃",
    "sub_dir" => '/home',
];

Validator::verify_user($_SESSION['user']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = $_POST['score'] ?? 0;
    $time_spent = $_POST['elapsedTime'] ?? '00:00:00';
    $username = $_SESSION['user'];

    $db->query("INSERT INTO results_multiple (score, username, time) VALUES (:score, :username, :time)", [
        ':score' => $score,
        ':username' => $username,
        ':time' => $time_spent,
    ])->fetch();
}

$rankers = $db->query("
    SELECT username, time, score
    FROM results_multiple
    ORDER BY
        -- Score in descending order (higher score first)
        score DESC,
        -- Convert MM:SS:MS to total seconds including milliseconds
        (CAST(SUBSTRING_INDEX(time, ':', 1) AS UNSIGNED) * 60) +  -- Minutes to seconds
        CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(time, ':', -2), ':', 1) AS UNSIGNED) +  -- Seconds
        CAST(SUBSTRING_INDEX(time, ':', -1) AS UNSIGNED) / 1000  -- Milliseconds to seconds
        ASC  -- Ascending order of time (lower is better)
    LIMIT 5
")->fetchAll();


// Include the view
require base_path('src/views/quiz-multiple.view.php');
