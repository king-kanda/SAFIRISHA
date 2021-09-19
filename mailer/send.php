<?php
// inputs from the qoute section.

// php send mail.
    require 'PHPMailerAutoload.php';
    $mail = new PHPMailer;
    // disable on a live hosting server. 
    $mail -> isSMTP();
    $mail ->host = 'smtp.gmail.com';
    $mail ->Port = 587;
    $mail -> SMTPAuth = true;
    $mail ->SMTPSecure ='tls';

    $mail -> Username = 'stevenokanda@gmail.com';
    $mail -> password  = 'onyango@okanda@steven';

    $mail -> setFrom('stevenokanda@gmail.com','okanda');
    $mail ->addAddress('stevenokanda@gmail.com');
    $mail ->addReplyTo('stevenokanda@gmail.com');

    $mail ->isHTML(true);
    $mail -> Subject = 'PHP mailer subject';
    $mail -> Body = '<h1 align=center> hello  this was sent <h1>';

     if(!$mail->send()){
         echo "message not sent".$mail->ErrorInfo;
     }
     else{
         echo "message sent succesfully";
     }
?>