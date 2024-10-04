<?php

namespace Http\Forms\Guest;

use Core\Validator;
use Http\Forms\Form;

class UpdateForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;
        if (!Validator::string($this->attributes['comment'], 5, 200)) {
            $this->errors['body'] = "Comments cannot be less than 5 characters and more than 200 character.";
        }
    }
}