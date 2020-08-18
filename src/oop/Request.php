<?php

class Request
{
    public array $query;
    public array $request;
    public array $server;

    public function __construct(array $query = [], array $request = [], ?array $server)
    {
        $this->query = $query;
        $this->request = $request;
        $this->server = $server;
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

        if (in_array($key, $get_array) && !in_array($key, $post_array)) {
            return $this->query[$key];
        } else if (in_array($key, $post_array) && !in_array($key, $get_array)
            || (in_array($key, $post_array) && in_array($key, $get_array))) {
            return $this->request[$key];
        } else if ((!in_array($key, $post_array) && !in_array($key, $get_array))) {
            return $default;
        }
    }

    public function all(array $only = []): array
    {
        $request_array = array_merge($this->request, $this->query);
        if (empty($only)) {
            return $request_array;
        } else {
            return array_merge($only, array_keys($request_array));
        }
    }

    public function has($key): bool
    {
        echo in_array($key, array_keys($this->query)) || in_array($key, array_keys($this->request)) ? true : false;
    }

    public function ip(): string
    {
        if (!empty($this->server['HTTP_CLIENT_IP'])) {
            $ip = $this->server['HTTP_CLIENT_IP'];
        } else if
        (!empty($this->server['HTTP_X_FORWARDED_FOR'])) {
            $ip = $this->server['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $this->server['REMOTE_ADDR'];
        }
        echo $ip;
    }

}