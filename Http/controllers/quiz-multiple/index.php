<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Technical Check-in",
    "description" => "a 10 question multiple-choice timed exam about PHP😃",
    "sub_dir" => '/home',
];

$project_info = [
    "creation_date" => "22/0/24 20:19",
    "last_modified" => "14/09/24 23:15",
    "author" => "Shimi Jallores",
    "tags" => ["quiz", "php", "project"],
];

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
")->get();


// Include the view
require base_path('Http/views/quiz-multiple/index.php');
