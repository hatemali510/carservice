<?php

$host="mysql3.000webhost.com";
$user="a3429026_hatem";
$password="Hatem1571961@";
$db = "a3429026_new";
$link = mysqli_connect($host, $user, $password);
mysqli_select_db($link, $db) or die(mysql_error());

?>