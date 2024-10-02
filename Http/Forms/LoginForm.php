<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($username, $password)
    {
        if (!Validator::string($password)) {
            $this->errors['body'] = "password enter a valid password";
        }

        if (!Validator::string($username)) {
            $this->errors['body'] = "please enter a valid username.";
        }

        return empty($this->errors);
    }

    public function get_errors()
    {
        return $this->errors;
    }
}