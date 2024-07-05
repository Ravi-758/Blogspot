<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../../vendor/autoload.php';

function sendMail($email, $name, $token){
    $mail = new PHPMailer();
    // try {
        $mail->SMTPDebug = 1;                 
        $mail->isSMTP();                        
        $mail->Host       = 'smtp-relay.brevo.com'; 
        $mail->SMTPAuth   = true;        
        $mail->Username   = 'nirbhau.jass@gmail.com';    
        $mail->Password   = 'xsmtpsib-c707a08d278fd0d896f8d75d28d02178013748a111e26d98982d82825171ed5a-6LGJ4XDHNFQTwfYa';
        $mail->SMTPSecure = 'tls';              
        $mail->Port       = 587;                                  
        
        $mail->setFrom('blogSpot.business@gmail.com', 'Mailer');
        
        $mail->addAddress($email, $name);   
        
        $mail->isHTML(true);                                 
        $mail->Subject = 'Thank you for Registering';
        $mail->Body    = 'Hi ' . $name . '<br>
        <br>
        Thank you for registering with us.<br>
        <br>
        Click on this link to verify your account.<br>
        <br> 
        <b>' . $token . '</b>';
        $mail->send();
        
//     } catch (Exception $e) {
//         echo("Message could not be sent. Mailer Error:" {$mail->ErrorInfo});
//     }
}