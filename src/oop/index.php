<?php

require_once "class/Request.php";
require_once "class/Sessions.php";
require_once "class/Cookies.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>OOP</title>
</head>
<body>
<main>
    <?php
    $_SESSION['test'] = 42;
    $_COOKIE['car'] = 'BMW';
    $session = new Sessions($_SESSION);
    $cookies = new Cookies($_COOKIE);
    $request = new Request($_GET, $_POST, $_SERVER, $session, $cookies);
    ?>

    <?php
    $request_methods = get_class_methods($request);
    $session_methods = get_class_methods($session);
    $cookies_methods = get_class_methods($cookies);
    ?>
    <div class="container headers">
        <div class="row">
            <div class="col-sm">
                Request
            </div>
            <div class="col-sm">
                Session
            </div>
            <div class="col-sm">
                Cookies
            </div>
        </div>
    </div>

    <div class="container method-title">
        <h2>Method class:</h2>
    </div>

    <div class="container title">
        <div class="row">
            <div class="col-sm method-col">
                <ol class="method">
                    <?php foreach ($request_methods as $method)
                        if ($method === '__construct') {
                            continue;
                        } else {
                            echo "<a href='page/request.php?method=$method' class='link_s'><li> $method </li></a>";
                        }

                    ?>
                </ol>
            </div>
            <div class="col-sm method-col">
                <ol class="method">
                    <?php foreach ($session_methods as $method)
                        if ($method === '__construct') {
                            continue;
                        } else {
                            echo "<a href='page/session.php?method=$method' class='link_s'><li> $method </li></a>";
                        }
                    ?>
                </ol>
            </div>
            <div class="col-sm method-col">
                <ol class="method">
                    <?php foreach ($cookies_methods as $method)
                        if ($method === '__construct') {
                            continue;
                        } else {
                            echo "<a href='page/cookies.php?method=$method' class='link_s'><li> $method </li></a>";
                        }
                    ?>
                </ol>
            </div>
        </div>
    </div>
</main>
</body>
</html>