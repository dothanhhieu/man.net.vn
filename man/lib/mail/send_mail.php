<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'Exception.php';
require_once 'PHPMailer.php';
require_once 'SMTP.php';

function sendMail($to,$subject,$content,$content_nonHTML)
{
    $from='tienlu1988@gmail.com';
    $pass='091288Lct';
    $mail = new PHPMailer(false);

    try {
        // Server settings
        
        $mail->CharSet = "UTF-8";
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        $mail->Username = $from; // YOUR gmail email
        $mail->Password = $pass; // YOUR gmail password
    
        // Sender and recipient settings
        $mail->setFrom($from, 'Master Accountant Network');
        $mail->addAddress($to, 'Receiver Name');
        $mail->addReplyTo($from, 'Master Accountant Network'); // to set the reply to
    
        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $content;
        $mail->AltBody = $content_nonHTML;
    
        $s=$mail->send();
        return true;
    } catch (Exception $e) {
        return false;//: {$mail->ErrorInfo}";
    }
}


?>