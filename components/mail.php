<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../../vendor/autoload.php';

//Create an instance; passing true enables exceptions

function sendMail($email, $name, $token){
    $mail = new PHPMailer();
    try {
        $mail->SMTPDebug = 0;                 
        $mail->isSMTP();                        
        $mail->Host       = 'smtp-relay.brevo.com'; 
        $mail->SMTPAuth   = true;        
        $mail->Username   = 'sanjnadadralh1970@gmail.com';    
        $mail->Password   = 'xsmtpsib-6de0e8f18904ead6d006525c92a0a2b6e50cff310c7776341088615353e6a055-Mm1Bd3fECAKVRnt9';
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
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>