<?php

session_start();

$sub_dir = '/home';
$trace = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (!$_SESSION['user']) {
    header("Location: /login");
    exit();
} else {
    $user = $_SESSION['user'];
}

//Logic for Quiz
$quiz = [
    [
        'question' => 'Which PHP function is used to serialize an object for storage?',
        'options' => [
            'A' => 'json_encode()',
            'B' => 'serialize()',
            'C' => 'var_export()',
            'D' => 'str_split()'
        ],
        'correct_option' => 'B'
    ],
];

var_dump($_SESSION);

if (empty($_SESSION['current_question']) || isset($_POST['reset'])) {
    $_SESSION['current_question'] = '';
    $_SESSION['score'] = 0;
    $_SESSION['result'] = '';
}

require base_path('src/views/quiz1.view.php');
