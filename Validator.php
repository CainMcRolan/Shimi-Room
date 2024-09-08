<?php

class Validator {
    public static function string($char, $min = 5, $max = 200) : bool
    {
        $char = trim($char);

        return strlen($char) >= $min && strlen($char) <= $max;
    }
}