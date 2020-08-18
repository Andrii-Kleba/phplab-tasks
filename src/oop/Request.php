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

    public function query(string $key, $default = null)
    {
        if (array_key_exists($key, $this->query)) {
            return $this->query[$key];
        } else {
            return $default;
        }
    }

    public function post(string $key, $default = null)
    {
        if (array_key_exists($key, $this->request)) {
            return $this->request[$key];
        } else {
            return $default;
        }
    }

}