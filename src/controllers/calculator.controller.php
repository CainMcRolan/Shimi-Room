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

//Logic for Calculator
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = null;
    $errors = [];

    $num_1 = $_POST['num_1'];
    $num_2 = $_POST['num_2'];
    $operation = $_POST['operation'];

    if ($operation === 'Divide' && $num_2 == 0) {
        $errors['body'] = 'You cannot divide by 0';
    }

    if (!is_numeric($num_1) || !is_numeric($num_2)) {
        $errors['body'] = 'input not a valid number!';
    }

    if (empty($errors)) {
        switch($operation)
        {
            case 'Add':
                $result = $num_1 + $num_2;
                break;
            case 'Subtract':
                $result = $num_1 - $num_2;
                break;
            case 'Multiply':
                $result = $num_1 * $num_2;
                break;
            case 'Divide':
                $result = $num_1 / $num_2;
                break;
        }

        $result = round($result, 2);
        $result = 'Result: ' . $result;
    }
}

require base_path('src/views/calculator.view.php');
