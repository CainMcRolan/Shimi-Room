<?php

$header_info = [
    "trace" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    "title" => "Unauthorized.",
    "description" => "",
];

require "partials/head.php";
require "partials/background.php";
require "partials/header.php";
require "partials/nav.php";
require "partials/main.php";
?>
    <a href="/home" class="text-blue-500 underline">go back</a>
<?php
require "partials/aside.php";
require "partials/footer.php";
?>