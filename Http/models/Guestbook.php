<?php

namespace Http\models;

use Core\App;
use Core\Database;

class Guestbook
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function get_user($username)
    {
        return $this->db->query("select * from users where username = :username", [":username" => $username])->find();
    }

    public function get_comments()
    {
        return $this->db->query("select * from notes order by id asc")->get();
    }

    public function get_comment($id)
    {
        return $this->db->query("select * from notes where id = :id", [':id' => $id])->find_or_fail();
    }
}