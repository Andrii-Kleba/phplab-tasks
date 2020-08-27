<?php
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
    <title>COOKIES</title>
</head>
<body>
<section>
    <?php
    $_SESSION['start_s'] = "S_start";
    $_COOKIE['start_c'] = 'C_start';
    $cookies = new Cookies($_COOKIE);
    $pageBuilder = new PageBuilder($_REQUEST);
    ?>
    <div class="container title">
        <div class="row">
            <div class="col-sm">
                Cookies
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        $currentMethod = $pageBuilder->getCurrentMethod($cookies);
        ?>
    </div>

    <div class="container main">
        <div class="name_method">
            Demonstrate method:
            <h1><?= $pageBuilder->toUpperCaseMethod($currentMethod); ?></h1>
        </div>
    </div>
    <div class="container">
        <?php
        $title = PageBuilder::TITLE_TASK;
        switch ($currentMethod):
            case 'all':
                echo $title;
                echo "<p>Returns all \$_COOKIES in the associative array. If \$only is not empty - return only keys from \$only parameter</p>";
                echo "<br>";
                print_r($cookies->all());
                break;
            case 'get':
                echo $title;
                echo "<p>Returns \$_COOKIE value by key and \$default if key does not exist</p>";
                echo "<br>";
                echo "{$cookies->get('start_c', 'not found')}";
                break;
            case 'set':
                echo $title;
                echo "<p>Sets cookie</p>";
                echo "<br>";
                $cookies->set('Cookie', 'set');
                echo "Success set";
                break;
            case 'has':
                echo $title;
                echo "<p>Return true if \$key exists in \$_COOKIES</p>";
                echo "<br>";
                echo "{$cookies->has('start_s')}";
                break;
            case 'remove':
                echo $title;
                echo "<p>Removes cookie by name</p>";
                echo "<br>";
                $cookies->remove('start_s');
                echo "REMOVE Cookie by key";
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