<?php

use Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("src/views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path("Http/views/" . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}