<?php
include "../class/Request.php";
include "../class/Sessions.php";
include "../class/Cookies.php";
include "../class/PageBuilder.php";
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
    <link rel="stylesheet" href="../style/pages.css">
    <title>REQUEST</title>
</head>
<body>
<section>

    <?php
    $_SESSION['start_s'] = "S_start";
    $_COOKIE['start_c'] = 'C_start';
    $session = new Sessions($_SESSION);
    $cookies = new Cookies($_COOKIE);
    $request = new Request($_GET, $_POST, $_SERVER, $session, $cookies);
    $pageBuilder = new PageBuilder($_REQUEST);
    $request->query['param'] = 'parameter get';
    $request->request['postParam'] = 'parameter post';
    ?>
    <div class="container title">
        <div class="row">
            <div class="col-sm">
                Request
            </div>
        </div>
    </div>

    <div class="container">
        <?php
        $currentMethod = $pageBuilder->getCurrentMethod($request);
        ?>
    </div>

    <div class="container main">
        <div class="name_method">
            Demonstrate method:
            <h1><?= $pageBuilder->toUpperCaseMethod($currentMethod); ?></h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm"> <?php
                $title = "<h2>&#9654; TASK:</h2>";
                switch ($currentMethod):
                    case 'query':
                        echo $title;
                        echo "<p>Returns \$_GET parameter by \$key and \$default if does not exist</p>";
                        echo "<br>";
                        echo "Your parameter => {$request->query('param')}";
                        break;
                    case 'post':
                        echo $title;
                        echo "<p>Returns \$_POST parameter by \$key and \$default if does not exist</p>";
                        echo "Your parameter => {$request->post('postParam')}";
                        break;
                    case 'get':
                        echo $title;
                        echo "<p>Returns \$_GET or \$_POST parameter by \$key. If both are present - return \$_POST. If both ate empty - return \$default</p>";
                        echo "<br>";
                        echo "Your param = {$request->get('postParam', 'default')}";
                        break;
                    case 'all':
                        echo $title;
                        echo "<p>Returns all \$_GET + \$_POST parameters in the associative array. If \$only is not empty - return only keys from \$only parameter</p>";
                        echo "<br>";
                        print_r([$request->all()]);
                        break;
                    case 'has':
                        echo $title;
                        echo "<p>Return true if \$key exists in \$_GET or \$_POST</p>";
                        echo "<br>";
                        echo "{$request->has('param')}";
                        break;
                    case 'ip':
                        echo $title;
                        echo "<p>Returns users IP</p>";
                        echo "<br>";
                        echo "Your ip = {$request->ip()}";
                        break;
                    case 'userAgent';
                        echo $title;
                        echo "<p>Returns users browser User Agent</p>";
                        echo "<br>";
                        echo "User Agent = {$request->userAgent()}";
                        break;
                    default:
                        echo "This method is undefined";
                endswitch;
                ?></div>
        </div>
    </div>

    <div class="container">
        <button type="button" class="btn_s btn btn-secondary" onclick="javascript:window.location='../index.php'">GO
            BACK
        </button>
    </div>
</section>
</body>
</html>