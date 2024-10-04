<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;
        if (!Validator::string($this->attributes['password'])) {
            $this->errors['body'] = "enter a valid password";
        }

        if (!Validator::string($this->attributes['username'])) {
            $this->errors['body'] = "please enter a valid username.";
        }
    }
}