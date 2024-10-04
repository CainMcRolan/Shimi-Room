<?php

namespace Core\Repository;

use Core\App;
use Core\Database;

class Guestbook
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function guestbook_attempt($username, $comment)
    {
        $user = $this->db->query("select * from users where username = :username", [":username" => $username])->find();
        $user_id = $user['id'] ?? null;

        //Check if there is no user
        if (!$_SESSION['user'] ?? false) {
            //Check if the guest name is not similar to any existing user
            if (!$user) {
                $this->db->query("insert into notes (username, comment, user_id) values(:username, :comment, :user_id)", [":username" => $username, ":comment" => $comment, ":user_id" => $user_id]);
                return true;
            }
            //If there is a user with similar name, return false and flash the error
            return false;
        }

        //If there is a logged-in user, just insert the comment in the database
        $this->db->query("insert into notes (username, comment, user_id) values(:username, :comment, :user_id)", [":username" => $username, ":comment" => $comment, ":user_id" => $user_id]);
        return true;
    }

    public function guestbook_update($comment, $id)
    {
        $this->db->query("update notes set comment = :comment where id = :id", [':comment' => $comment, 'id' => $id]);
        return true;
    }

    public function guestbook_delete($id)
    {
        $comment = $this->db->query("select * from notes where id = :id", [":id" => $id])->find();

        $user = $this->db->query("select * from users where username = :username", [":username" => $_SESSION['user']])->find();

        if ($comment['user_id'] ?? '' === $user['id']) {
            $this->db->query("DELETE FROM notes WHERE id = :delete_id", [":delete_id" => $id]);
        }
    }
}