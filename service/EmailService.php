<?php 
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;




class EmailService {
    function send($to, $subject, $content, $reply=''){
        //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
// fix font chữ tiếng việt
$mail->CharSet = 'UTF-8';

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = SMTP_HOST; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = SMTP_USERNAME; //SMTP username
    $mail->Password = SMTP_SECRET; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(SMTP_USERNAME);
    $mail->addAddress($to);

    if($reply) {
        $mail ->addReplyTo($reply);
    }

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $content;

    $mail->send();
    echo 'đã gửi mail thành công';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    }
}
?>