<?php
//return [
//    "/" => base_path("login.controller.php"),
//    "/login" => base_path("login.controller.php"),
//    "/register" => base_path("register.controller.php"),
//    "/home" => base_path("home.controller.php"),
//    "/guest" => base_path("guestbook/index.php"),
//    "/calculator" => base_path("calculator.controller.php"),
//    "/quiz-multiple" => base_path("index.php"),
//    "/quiz-identify" => base_path("index.php"),
//    "/stopwatch" => base_path("stopwatch.controller.php"),
//];

//Non-Dynamic Pages
$router->get('/', 'login/index.php')->only('guest');
$router->get('/home', 'home.controller.php')->only('user');
$router->get('/stopwatch', 'stopwatch.controller.php')->only('user');

//Login
$router->get('/login', 'login/index.php')->only('guest');
$router->post('/login/verify', 'login/verify.php')->only('guest');

//Logout
$router->delete('/logout', 'login/logout.php')->only('user');

//Register
$router->get('/register', 'register/index.php')->only('guest');
$router->post('/register/verify', 'register/verify.php')->only('guest');

//Guest
$router->get('/guest', 'guestbook/index.php');
$router->post('/guest/create', 'guestbook/create.php');
$router->delete('/guest/destroy', 'guestbook/destroy.php');

//Calculator
$router->get('/calculator', 'calculator.controller.php')->only('user');
$router->post('/calculator', 'calculator.controller.php')->only('user');

//Edit Comments

//weird behaviour in which I have to flatten the url or else the styling won't apply, it's because of the styling relative pathing
//Future shimi, either you gotta find a fix for this shit or you'll just fuck yourself  up, or just find another file structure except for laracast

$router->get('/edit', 'guestbook/edit.php')->only('user');
$router->patch('/guest/update', 'guestbook/update.php');

//Quiz-Identify
$router->get('/quiz-identify', 'quiz-identify/index.php')->only('user');
$router->post('/quiz-identify/create', 'quiz-identify/create.php')->only('user');

//Quiz-Multiple
$router->get('/quiz-multiple', 'quiz-multiple/index.php')->only('user');
$router->post('/quiz-multiple/create', 'quiz-multiple/create.php')->only('user');

//Student Data Chart
$router->get('/chart', 'chart.controller.php')->only('user');

