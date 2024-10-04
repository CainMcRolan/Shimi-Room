<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];
    protected $attributes = [];

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

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->get_errors(), $this->get_attributes());
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function get_attributes()
    {
        return $this->attributes;
    }

    public function get_errors()
    {
        return $this->errors;
    }

    public function error($field, $error)
    {
        $this->errors[$field] = $error;

        return $this;
    }

}