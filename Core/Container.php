<?php

namespace Core;

class Container
{
    protected $binds = [];
    public function bind($key, $resolver)
    {
        $this->binds[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (! array_key_exists($key, $this->binds)) {
            throw new \Exception("Unable to find bind for " . $key);
        }

        $resolver = $this->binds[$key];

        return call_user_func($resolver);
    }
}