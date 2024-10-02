<?php

namespace Http\Forms;

use Core\Validator;

class RegisterForm
{
    protected $errors = [];

    public function validate($username, $password)
    {
        if (!Validator::string($password, 5, INF)) {
            $this->errors['body'] = 'password cannot be shorter than 5 characters';
        }

        if (!Validator::string($username)) {
            $this->errors['body'] = 'username cannot be shorter than 5 characters';
        }

        return empty($this->errors);
    }

    public function get_errors()
    {
        return $this->errors;
    }

    public function error($field, $error)
    {
        $this->errors[$field] = $error;
    }
}