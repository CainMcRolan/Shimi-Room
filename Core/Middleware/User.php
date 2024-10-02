<?php

namespace Core\Middleware;
class User
{
    public function handle()
    {
        if (! $_SESSION['user'] ?? false) {
            header('location: /login');
            exit();
        }
    }
}