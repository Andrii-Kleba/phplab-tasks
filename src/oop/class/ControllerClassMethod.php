<?php

class ControllerClassMethod
{
    private array $request;

    public function __construct(?array $request)
    {
        $this->request = $request;
    }

    public function getPageNameObject($object): string
    {
        return strtolower(get_class($object));
    }

    public function getAllMethod($object): array
    {
        return get_class_methods($object);
    }

    public function getCurrentMethod($object): string
    {
        $methods = $this->getAllMethod($object);

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
