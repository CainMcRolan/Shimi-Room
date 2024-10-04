<?php

namespace Http\Forms;

use Core\ValidationException;

class Form
{
    protected $errors = [];
    public array $attributes = [];

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
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