<?php

use Core\Validator;

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Student Enrollment Chart",
    "description" => "Student Enrollment in Different Departments at Lipa City Colleges",
    "sub_dir" => '/home',
];

$project_info = [
    "creation_date" => "02/10/24 14:26",
    "last_modified" => "02/10/24 14:26",
    "author" => "Shimi Jallores",
    "tags" => ["chart", "data", "students"],
];

require base_path('src/views/chart.view.php');
