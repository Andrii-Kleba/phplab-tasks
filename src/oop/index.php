<?php

namespace \Request::class;

require_once 'Request.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$_POST['lala'] = 323;
$_POST['cool'] = 'COOL';
$request = new Request($_GET, $_POST);
$request->has('lala');

?>
</body>
</html>