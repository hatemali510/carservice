<?php
$to="ahmed.sylar@yahoo.com";
$subject="welcome";
$message="mail from localhost";
if(mail($to,$subject,$message)){
    echo "email is sent sucessfully";
    
}
else{
    echo'sorry';
}
?>

