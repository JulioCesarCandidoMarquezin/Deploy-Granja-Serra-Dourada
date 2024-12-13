<?php
$name = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'sendadordeemail@gmail.com';                     
    $mail->Password   = 'pdjr mukm ruwx rczo';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                                    

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('damarislopeslima63@gmail.com', 'Mulher');     
    $mail->addReplyTo($email, $name);

    //Content
    $mail->Subject = $assunto;
    $mail->Body    = $mensagem;


    $mail->send();
    echo 'Message has been sent';
    header("Location: ../contato.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}