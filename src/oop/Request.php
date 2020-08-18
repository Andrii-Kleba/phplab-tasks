<?php

class Request
{
    public array $request;
    public array $getRequest;

    public function __construct(array $request, array $getRequest)
    {
        $this->request = $request;
        $this->getRequest = $getRequest;
    }

    public function query($key, $default = null)
    {
        return !empty($_GET[$key]) ? $_GET[$key] : $_GET[$default];
    }

    public function post($key, $default = null)
    {
        return !empty($_POST[$key]) ? $_POST[$key] : $_POST[$default];
    }
}