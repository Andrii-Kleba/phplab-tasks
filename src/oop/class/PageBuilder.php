<?php

class PageBuilder
{
    const TITLE_TASK = "<h2>&#9654; TASK:</h2>";


    public static function buildAllClassMethod($object, ControllerClassMethod $classMethod): void
    {
        $methods = $classMethod->getAllMethod($object);
        $pageName = $classMethod->getPageNameObject($object);

        foreach ($methods as $method)
            if ($method === '__construct') {
                continue;
            } else {
                echo "<a href='page/$pageName.php?method=$method' class='link_s'><li> $method </li></a>";
            }
    }

}