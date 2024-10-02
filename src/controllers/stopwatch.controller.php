<?php

use Core\Validator;

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Stopwatch",
    "description" => "tick tock tick tock, hurry up its a 🚫⌚",
    "sub_dir" => '/home',
];

$project_info = [
    "creation_date" => "05/09/24 20:19",
    "last_modified" => "14/09/24 23:18",
    "author" => "Shimi Jallores",
    "tags" => ["stopwatch", "timer", "project"],
];

require base_path('src/views/stopwatch.view.php');
