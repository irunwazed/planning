<?php
include "classes/class.phpmailer.php";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "smtp.gmail.com"; //host masing2 provider email
$mail->SMTPDebug = 1;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "simple.email.website@gmail.com"; //user email
$mail->Password = "qwerty123@"; //password email 
$mail->SetFrom("simple.email.website@gmail.com","Si Pandai"); //set email pengirim
$mail->Subject = "Testing 2"; //subyek email
$mail->AddAddress("irunwazed@gmail.com","Akachiro");  //tujuan email
$mail->MsgHTML("Testing....");
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
?>