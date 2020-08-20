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

    public function get($key, $default = null)
    {
        return in_array($key, array_keys($this->cookies)) ? $this->cookies[$key] : $default;
    }

    public function set($key, $value)
    {
        $this->cookies[$key] = $value;
    }

    public function has($key): bool
    {
        return in_array($key, array_keys($this->cookies)) ? true : false;
    }

    public function remove($key)
    {
        unset($this->cookies[$key]);
        setcookie($key, '', time() - 3600);
    }
}