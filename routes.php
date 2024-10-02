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
$router->get('/', 'src/controllers/login/index.php')->only('guest');
$router->get('/home', 'src/controllers/home.controller.php')->only('user');
$router->get('/calculator', 'src/controllers/calculator.controller.php')->only('user');
$router->get('/stopwatch', 'src/controllers/stopwatch.controller.php')->only('user');

//Login
$router->get('/login', 'src/controllers/login/index.php')->only('guest');
$router->post('/login/verify', 'src/controllers/login/verify.php')->only('guest');

//Logout
$router->delete('/logout', 'src/controllers/login/logout.php')->only('user');

//Register
$router->get('/register', 'src/controllers/register/index.php')->only('guest');
$router->post('/register/verify', 'src/controllers/register/verify.php')->only('guest');

//Guest
$router->get('/guest', 'src/controllers/guestbook/index.php');
$router->post('/guest/create', 'src/controllers/guestbook/create.php');
$router->delete('/guest/destroy', 'src/controllers/guestbook/destroy.php');

//Edit Comments

//weird behaviour in which I have to flatten the url or else the styling won't apply, it's because of the styling relative pathing
//Future shimi, either you gotta find a fix for this shit or you'll just fuck yourself  up, or just find another file structure except for laracast

$router->get('/edit', 'src/controllers/guestbook/edit.php')->only('user');
$router->patch('/guest/update', 'src/controllers/guestbook/update.php');

//Quiz-Identify
$router->get('/quiz-identify', 'src/controllers/quiz-identify/index.php')->only('user');
$router->post('/quiz-identify/create', 'src/controllers/quiz-identify/create.php')->only('user');

//Quiz-Multiple
$router->get('/quiz-multiple', 'src/controllers/quiz-multiple/index.php')->only('user');
$router->post('/quiz-multiple/create', 'src/controllers/quiz-multiple/create.php')->only('user');

//Student Data Chart
$router->get('/chart', 'src/controllers/chart.controller.php')->only('user');

