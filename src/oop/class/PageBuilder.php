<?php

class PageBuilder
{
    private array $request;

    public function __construct(?array $request)
    {
        $this->request = $request;
    }

    public function getCurrentMethod($object): string
    {
        $session_methods = get_class_methods($object);

        $currentMethod = '';
        foreach ($session_methods as $method) {
            if ($method === $this->request['method']) {
                $currentMethod = $method;
            }
        }

        return $currentMethod;
    }

    public function toUpperCaseMethod($method): string
    {
        return strtoupper($method);
    }

    public function buildAllClassMethod($object)
    {
        $methods = get_class_methods($object);
        foreach ($methods as $method)
            if ($method === '__construct') {
                continue;
            } else {
                echo "<a href='page/request.php?method=$method' class='link_s'><li> $method </li></a>";
            }
    }
}