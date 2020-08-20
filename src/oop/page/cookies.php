<?php
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
    <link rel="stylesheet" href="../style/cookies.css">
    <title>COOKIES</title>
</head>
<body>
<section>
    <?php
    $_SESSION['start_s'] = "S_start";
    $_COOKIE['start_c'] = 'C_start';
    $cookies = new Cookies($_COOKIE);
    $cookie_methods = get_class_methods($cookies);
    ?>
    <div class="container cookies_title">
        <div class="row">
            <div class="col-sm">
                Cookies
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        $currentMethod = '';
        foreach ($cookie_methods as $method) {
            if ($method === $_REQUEST['method']) {
                $currentMethod = $method;
            }
        }
        ?>
    </div>

    <div class="container main">
        <h1 class="name_method">Demonstrate method: <?= strtoupper($currentMethod) ?>() </h1>
    </div>
    <div class="container">
        <?php
        switch ($currentMethod):
            case 'all':
                echo "<h2>TASK:</h2>";
                echo "<p>Returns all \$_COOKIES in the associative array. If \$only is not empty - return only keys from \$only parameter</p>";
                break;
            case 'get':
                echo "<h2>TASK:</h2>";
                echo "<p>Returns \$_COOKIE value by key and \$default if key does not exist</p>";
                break;
            case 'set':
                echo "<h2>TASK:</h2>";
                echo "<p>Sets cookie</p>";
                break;
            case 'has':
                echo "<h2>TASK:</h2>";
                echo "<p>Return true if \$key exists in \$_COOKIES</p>";
                break;
            case 'remove':
                echo "<h2>TASK:</h2>";
                echo "<p>Removes cookie by name</p>";
                break;
            default:
                echo "This method is undefined";
        endswitch;
        ?>
    </div>


    <div class="container">
        <button type="button" class="btn_s btn btn-secondary" onclick="javascript:window.location='../index.php'">GO
            BACK
        </button>
    </div>
</section>
</body>
</html>