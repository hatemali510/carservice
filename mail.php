<?php

$to="ahmed.sylar26@gmail.com";
$subject="Mail from localhost";
$txt="Hello there";
$headers="From: donotreply@fnt.com" . "\r\n" . "CC:ex@example.com";

mail($to,$subject,$txt,$headers);

?>