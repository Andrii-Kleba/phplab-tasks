<?php

require_once "class/Request.php";
require_once "class/Sessions.php";
require_once "class/Cookies.php";
require_once "class/PageBuilder.php";

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
    $pageBuilder = new PageBuilder($_REQUEST);
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
                    <?php
                    $pageBuilder->buildAllClassMethod($request);
                    ?>
                </ol>
            </div>
            <div class="col-sm method-col">
                <ol class="method">
                    <?php
                    $pageBuilder->buildAllClassMethod($session);
                    ?>
                </ol>
            </div>
            <div class="col-sm method-col">
                <ol class="method">
                    <?php
                    $pageBuilder->buildAllClassMethod($cookies);
                    ?>
                </ol>
            </div>
        </div>
    </div>
</main>
</body>
</html>