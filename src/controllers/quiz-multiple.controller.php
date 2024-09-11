<?php

session_start();

$sub_dir = '/home';
$trace = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (empty($_SESSION['user'])) {
    header("Location: /login");
    exit();
} else {
    $user = $_SESSION['user'];
}

$quiz = require base_path('/src/data/quiz-v1-data.php');

if (empty($_SESSION['question_count']) || isset($_POST['reset'])) {
    $_SESSION['question_count'] = 0;
    $_SESSION['score'] = 0;
}

$result_message = '';
$error_message = '';
$current = $quiz[$_SESSION['question_count']];
$current_question = $current['question'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['reset'])) {
    if (empty($_POST['option'])) {
        $error_message = 'Pick an option above';
    } else {
        $selected_option = trim($_POST['option']);

        if ($selected_option === $current['correct_option']) {
            $_SESSION['score']++;
        }

        $_SESSION['question_count']++;

        if ($_SESSION['question_count'] >= count($quiz)) {
            $config = require base_path("config.php");
            $db = new Database($config['database']);

            $score = filter_var($_SESSION['score'], FILTER_SANITIZE_NUMBER_INT);
            $username = $_SESSION['user'];

            $result_message = $score . '/' . count($quiz);

            $db->query("INSERT INTO results_multiple (score, username) VALUES (:score, :username)", [
                ':score' => $score,
                ':username' => $username
            ])->fetch();

            $_SESSION['score'] = 0;
            $_SESSION['question_count'] = 0;
        } else {
            $current = $quiz[$_SESSION['question_count']];
            $current_question = $current['question'];
        }
    }
}

// Include the view
require base_path('src/views/quiz-multiple.view.php');
