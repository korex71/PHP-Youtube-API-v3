<?php
require_once("php/functions.php");
session_start();
?>
<?php

/**
 * FUNÇÃO responsável pelo PHPMailer
 * 
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mailer = new PHPMailer();

try {
  $mailer->SetLanguage('br'); //Linguagem padrão do e-mail
  $mailer->CharSet = "utf8"; //Charset do idioma escolhido
  $mailer->IsSMTP();
//    $mailer->SMTPDebug = 4;
  $mailer->SMTPAuth = true; //Você deseja que oe-mail seja autenticado ?
  $mailer->SMTPSecure = 'tls'; //Tipo de criptografia utilizada para envios de e-mail
  $mailer->Host = 'smtp.hostinger.com.br'; //Host da sua hospedagem
  $mailer->Port = 587; // Porta de acesso da hospedagem
  $mailer->Username = 'tst@iligrum.xyz'; //Usuário (e-mail) criado na hospedagem
  $mailer->Password = ''; //Senha do seu e-mail criado na hospedagem 
  $mailer->Priority = 1; //Prioridade do e-mail
  $mailer->setFrom('tst@iligrum.xyz', 'Iligrum'); // Email e nome de quem enviara o e-mail
  $mailer->addReplyTo('tst@iligrum.xyz', 'Iligrum'); // E-mail e nome de quem responderá o e-mail
  $mailer->AddAddress('tst@gmail.com'); //Para quem será enviado o e-mail ?
  $mailer->IsHTML(true); // O e-mail possui HTML ?
  $mailer->Subject = 'Titulo';
  $mailer->Body = 'Corpo do e-mail';
  $mailer->Send();
} catch (Exception $e) {
  var_dump($e);
}