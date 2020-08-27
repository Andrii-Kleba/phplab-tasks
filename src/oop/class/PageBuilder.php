<?php

class PageBuilder
{
    const TITLE_TASK = "<h2>&#9654; TASK:</h2>";
    private array $request;

    public function __construct(?array $request)
    {
        $this->request = $request;
    }

    public static function buildAllClassMethod($object): void
    {
        $methods = get_class_methods($object);
        $pageName = strtolower(get_class($object));

        foreach ($methods as $method)
            if ($method === '__construct') {
                continue;
            } else {
                echo "<a href='page/$pageName.php?method=$method' class='link_s'><li> $method </li></a>";
            }
    }


    public function getCurrentMethod($object): string
    {
        $methods = get_class_methods($object);

        $currentMethod = '';
        foreach ($methods as $method) {
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

}