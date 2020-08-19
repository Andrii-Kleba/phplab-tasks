<?php

require_once "iStorages.php";

class Cookies implements iStorages
{

    public array $cookies;

    public function __construct(array $cookies)
    {
        $this->cookies = $cookies;
    }


    public function all(array $only = []): array
    {
        if (!empty($only)) {
            return array_merge($only, array_keys($this->cookies));
        } else {
            return $this->cookies;
        }
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
}