<?php

require_once "iStorages.php";

class Sessions implements iStorages
{

    public function __construct()
    {
    }

    public function all(array $only = []): array
    {
        // TODO: Implement all() method.
    }

    public function get($key, $default = null): string
    {
        // TODO: Implement get() method.
    }

    public function set($key, $value): string
    {
        // TODO: Implement set() method.
    }

    public function has($key): string
    {
        // TODO: Implement has() method.
    }

    public function remove($key): string
    {
        // TODO: Implement remove() method.
    }

    public function clear()
    {
        // TODO: clear() method.
    }

}