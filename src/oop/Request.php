<?php

interface RequestView
{

    public function query($key, $default = null);

    public function post($key, $default = null);

    public function get($key, $default = null);

    public function all($key, $only = []);

    public function has($key);

    public function ip();

    public function userAgent();
}

class Request implements RequestView
{

    public function query($key, $default = null)
    {
        // TODO: Implement query() method.
    }

    public function post($key, $default = null)
    {
        // TODO: Implement post() method.
    }

    public function get($key, $default = null)
    {
        // TODO: Implement get() method.
    }

    public function all($key, $only = [])
    {
        // TODO: Implement all() method.
    }

    public function has($key)
    {
        // TODO: Implement has() method.
    }

    public function ip()
    {
        // TODO: Implement ip() method.
    }

    public function userAgent()
    {
        // TODO: Implement userAgent() method.
    }
}