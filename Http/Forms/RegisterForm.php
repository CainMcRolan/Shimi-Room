<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RegisterForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::string($attributes['password'], 5, INF)) {
            $this->errors['body'] = 'password cannot be shorter than 5 characters';
        }

        if (!Validator::string($attributes['username'])) {
            $this->errors['body'] = 'username cannot be shorter than 5 characters';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->get_errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
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