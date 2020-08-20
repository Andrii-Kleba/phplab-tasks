<?php

require_once "interface/iStorages.php";

class Sessions implements iStorages
{
   public array $session;

    public function __construct(array $session)
    {
        session_start();
        $this->session = $session;

    }

    public function all(array $only = []): array
    {
        if (!empty($only)) {
            return array_merge($only, array_keys($this->session));
        } else {
            return $this->session;
        }
    }

    public function get($key, $default = null)
    {
        return in_array($key, array_keys($this->session)) ? $this->session[$key] : $default;
    }

    public function set($key, $value)
    {
        $this->session[$key] = $value;
    }

    public function has($key): bool
    {
        return in_array($key, array_keys($this->session)) ? true : false;
    }

    public function remove($key)
    {
        unset($this->session[$key]);
    }

    public function clear()
    {
        session_unset();
    }


}