<?php

class ServiceContainer
{
    private $bindings = [];

    public function bind($key, $value)
    {
        $this->bindings[$key] = $value;
    }

    public function get($key)
    {
        if (!isset($this->bindings[$key])) {
            throw new Exception("No {$key} is bound in the container.");
        }

        return $this->bindings[$key];
    }
}