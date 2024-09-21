<?php
//return [
//    "/" => base_path("src/controllers/login.controller.php"),
//    "/login" => base_path("src/controllers/login.controller.php"),
//    "/register" => base_path("src/controllers/register.controller.php"),
//    "/home" => base_path("src/controllers/home.controller.php"),
//    "/guest" => base_path("src/controllers/guestbook/index.php"),
//    "/calculator" => base_path("src/controllers/calculator.controller.php"),
//    "/quiz-multiple" => base_path("src/controllers/quiz-multiple.controller.php"),
//    "/quiz-identify" => base_path("src/controllers/quiz-identify.controller.php"),
//    "/stopwatch" => base_path("src/controllers/stopwatch.controller.php"),
//];

//To be Edited
$router->get('/', 'src/controllers/login.controller.php');
$router->get('/login', 'src/controllers/login.controller.php');
$router->get('/register', 'src/controllers/register.controller.php');
$router->get('/home', 'src/controllers/home.controller.php');
$router->get('/calculator', 'src/controllers/calculator.controller.php');
$router->get('/quiz-multiple', 'src/controllers/quiz-multiple.controller.php');
$router->get('/quiz-identify', 'src/controllers/quiz-identify.controller.php');
$router->get('/stopwatch', 'src/controllers/stopwatch.controller.php');

//Guest
$router->get('/guest', 'src/controllers/guestbook/index.php');
$router->post('/guest/create', 'src/controllers/guestbook/create.php');
$router->delete('/guest/destroy', 'src/controllers/guestbook/destroy.php');