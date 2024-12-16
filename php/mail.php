<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$smtp_user = getenv('SMTP_USER'); 
$smtp_password = getenv('SMTP_PASSWORD');

function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

$name = sanitizeInput($_POST["nome"] ?? '');
$telefone = sanitizeInput($_POST["telefone"] ?? '');
$email = filter_var($_POST["email"] ?? '', FILTER_VALIDATE_EMAIL);
$assunto = sanitizeInput($_POST["assunto"] ?? '') . " id: " . uniqid();
$mensagem = sanitizeInput($_POST["mensagem"] ?? '') . $telefone;

if (empty($name) || empty($telefone) || !$email || empty($mensagem)) {
    die("Preencha todos os campos corretamente.");
}

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp_user;
    $mail->Password   = $smtp_password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom($smtp_user, 'Granja Serra Dourada');
    $mail->addAddress('granja-serra-dourada@gmail.com', 'Granja Serra Dourada');
    $mail->addReplyTo($email, $name);

    $mail->Subject = $assunto;
    $mail->Body    = $mensagem;

    $mail->send();

    header("Location: /contato.php");
    exit;
} catch (Exception $e) {
    error_log("Erro ao enviar e-mail: {$mail->ErrorInfo}");
    header("Location: /contato.php?status=error");
    exit;
}
