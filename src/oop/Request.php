<?php

class Request
{
    public array $query;
    public array $request;

    public function __construct(array $query, array $request)
    {
        $this->query = $query;
        $this->request = $request;
    }

    public function query($key, $default = null): string
    {
        if (in_array($key, $_GET)) {
            return $this->query[$key];
        } else {
            return $default;
        }
    }

    public function post($key, $default = null): string
    {
        if (in_array($key, $_POST)) {
            return $this->request[$key];
        } else {
            return $default;
        }
    }

    public function get($key, $default = null)
    {
        $param = $key;


    }
}