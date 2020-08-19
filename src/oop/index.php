<?php

require_once "Request.php";
require_once "Sessions.php";
require_once "Cookies.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OOP</title>
</head>
<body>
<?php
$_POST['cool'] = 'POst';
$_SESSION['test'] = 42;
$session = new Sessions($_SESSION);
$cookies = new Cookies($_COOKIE);
$request = new Request($_GET, $_POST, $_SERVER, $session, $cookies);
$na = "Hello";
setcookie('COOL', $na, time() + 3600);
$arr = [1, 2];
echo $cookies->remove('COOL');
?>
</body>
</html>