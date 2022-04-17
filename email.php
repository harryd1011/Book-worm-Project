<?php 
$to_email = "hd35065@gmail.com";
$subject = "Simple email test";
$body = "Hi, My name is Harsh Dubey. This is test mail";
$headers = "From: 20ce028@charusat.edu.in";

if(mail($to_email, $subject, $body, $headers)){
    echo "Email successfully sent to $to_email...";
}
else{
    echo "Email sending fail...";
}
// https://myaccount.google.com/u/0/security?pli=1&nlr=1
?>