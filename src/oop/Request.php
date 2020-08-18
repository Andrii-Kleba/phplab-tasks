<?php

class Request
{
    public array $query;
    public array $request;

    public function __construct(array $query = [], array $request = [])
    {
        $this->query = $query;
        $this->request = $request;
    }

    public function query(string $key, $default = null): string
    {
        if (array_key_exists($key, $this->query)) {
            return $this->query[$key];
        } else {
            return $default;
        }
    }

    public function post(string $key, $default = null): string
    {
        if (array_key_exists($key, $this->request)) {
            return $this->request[$key];
        } else {
            return $default;
        }
    }

    public function get($key, $default = null): string
    {
        $get_array = array_keys($this->query);
        $post_array = array_keys($this->request);

        if (in_array($key, $get_array) && in_array($key, $post_array)) {
            return $this->request[$key] . "POST";
        } elseif (in_array($key, $get_array) && !in_array($key, $post_array)) {
            return $this->query[$key];
        } elseif (!in_array($key, $get_array) && in_array($key, $post_array)) {
            return $this->request[$key];
        } elseif (!in_array($key, $get_array) && !in_array($key, $post_array)) {
            return $default;
        }
    }

}