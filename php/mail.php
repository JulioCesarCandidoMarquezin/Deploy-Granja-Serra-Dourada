<?php

$name = $_POST["nome"];         
$email = $_POST["email"];       
$telefone = $_POST["telefone"]; 
$assunto = $_POST["assunto"];   
$mensagem = $_POST["mensagem"] . "<br> Nome da lenda: {$name}" . "<br> Telefone do indivíduo: {$telefone}";

$to = $email;  
$subject = $assunto;  
$message = $mensagem;  

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";  
$headers .= "From: pamonhasan@gmail.com" . "\r\n";  
$headers .= "Reply-To: pamonhasan@gmail.com " . "\r\n";  

if(mail($to, $subject, $message, $headers)) {
    echo "E-mail enviado com sucesso para {$email}!";
} else {
    echo "Falha ao enviar e-mail.";
}

