<?php
//return [
//    "/" => base_path("src/controllers/login.controller.php"),
//    "/login" => base_path("src/controllers/login.controller.php"),
//    "/register" => base_path("src/controllers/register.controller.php"),
//    "/home" => base_path("src/controllers/home.controller.php"),
//    "/guest" => base_path("src/controllers/guestbook/index.php"),
//    "/calculator" => base_path("src/controllers/calculator.controller.php"),
//    "/quiz-multiple" => base_path("src/controllers/index.php"),
//    "/quiz-identify" => base_path("src/controllers/index.php"),
//    "/stopwatch" => base_path("src/controllers/stopwatch.controller.php"),
//];

//Non-Dynamic Pages
$router->get('/', 'src/controllers/login.controller.php');
$router->get('/home', 'src/controllers/home.controller.php');
$router->get('/calculator', 'src/controllers/calculator.controller.php');
$router->get('/stopwatch', 'src/controllers/stopwatch.controller.php');

//Login
$router->get('/login', 'src/controllers/login.controller.php');
$router->post('/login', 'src/controllers/login.controller.php');

//Register
$router->get('/register', 'src/controllers/register.controller.php');
$router->post('/register', 'src/controllers/register.controller.php');

//Guest
$router->get('/guest', 'src/controllers/guestbook/index.php');
$router->post('/guest/create', 'src/controllers/guestbook/create.php');
$router->delete('/guest/destroy', 'src/controllers/guestbook/destroy.php');

//Quiz-Identify
$router->get('/quiz-identify', 'src/controllers/quiz-identify/index.php');
$router->post('/quiz-identify/create', 'src/controllers/quiz-identify/create.php');

//Quiz-Multiple
$router->get('/quiz-multiple', 'src/controllers/quiz-multiple/index.php');
$router->post('/quiz-multiple/create', 'src/controllers/quiz-multiple/create.php');