<?php

namespace Core;

class Container
{
    protected $bindings = [];

    // add barang dalam container
    public function bind($key, $value)
    {
        $this->bindings[$key] = $value;
    }

    // ambil barang dari container
    public function resolve($key)
    {
        if (isset($this->bindings[$key])) {
            return call_user_func($this->bindings[$key]);
        }

        throw new \Exception("{$key} is not bound in the container.");
    }
}