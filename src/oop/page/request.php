<?php
include "../class/Request.php";
include "../class/Sessions.php";
include "../class/Cookies.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/request.css">
    <title>REQUEST</title>
</head>
<body>
<section>

    <?php
    $_SESSION['testa'] = 42;
    $_COOKIE['cars'] = 'BMW';
    $session = new Sessions($_SESSION);
    $cookies = new Cookies($_COOKIE);
    $request = new Request($_GET, $_POST, $_SERVER, $session, $cookies);
    $request_methods = get_class_methods($request);
    ?>
    <div class="container request_title">
        <div class="row">
            <div class="col-sm">
                Request
            </div>
        </div>
    </div>
    <div class="container">
        <button type="button" class="btn_s btn btn-secondary" onclick="javascript:window.location='../index.php'">GO
            BACK
        </button>
    </div>

    <div class="container">
        <?php
        $currentMethod = '';
        foreach ($request_methods as $method) {
            if ($method === $_REQUEST['method']) {
                $currentMethod = $method;
            }
        }

        echo $currentMethod;
        ?>
    </div>
</section>
</body>
</html>