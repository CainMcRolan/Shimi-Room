<?php

namespace Core;
class Validator {
    public static function string($char, $min = 5, $max = 200) : bool
    {
        $char = trim($char);

        return strlen($char) >= $min && strlen($char) <= $max;
    }

    public static function email($char)
    {
        return filter_var($char,FILTER_VALIDATE_EMAIL);
    }

    public static function verify_user($user)
    {
        if (empty($user)) {
            header("Location: /login");
            exit();
        } else {
            return $user;
        }
    }
}