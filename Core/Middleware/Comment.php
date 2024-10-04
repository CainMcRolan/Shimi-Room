<?php

namespace Core\Middleware;
class Comment
{
    public function handle()
    {
        if (!isset($_SESSION['user']) && empty($_GET['id'])) {
            header('Location: /guest');
            exit();
        }
    }
}