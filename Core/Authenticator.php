<?php

namespace Core;

class Authenticator
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function login_attempt($username, $password): bool
    {
        $user = $this->db->query("select * from users where username = :username", [':username' => $username])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($username);
                return true;
            }
        }

        return false;
    }

    public function login($username)
    {
        $_SESSION['user'] = $username;

        session_regenerate_id(true);
    }

    public function register_attempt($username, $password): bool
    {
        $user = $this->db->query("select * from users where username = :username", [':username' => $username])
            ->find();

        if (!$user) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->db->query("insert into users (username, password) values (:username, :password)", [':username' => $username, ':password' => $password]);
            return true;
        }

        return false;
    }
}