<?php
require("PHPMailer.php");
require("SMTP.php");
require("Exception.php");
$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->IsSMTP();                                      // Configurar email para utilizar SMTP
$mail->Host = "smtp.gmail.com";  // Especificar servidor principal y de copia.
$mail->CharSet = 'UTF-8';
$mail->SMTPAuth = true;     // Activar la autenticación SMTP
$mail->Username = "car.caceres.ochoa@gmail.com";  // SMTP usuario
$mail->Password = "cjcaceres741852"; // SMTP contraseña
$mail->Port = 587; // or 587
$mail->From = "car.caceres.ochoa@gmail.com";
$mail->FromName = "Restablecer Contraseña Sistema de Evaluación Semillero";
$mail->AddAddress("car.caceres.ochoa@hotmail.com", "Carlos Caceres");
/*
$mail->AddAddress("ellen@example.com");                  // name is optional
$mail->AddReplyTo("info@example.com", "Information");
*/
$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "robotsistemasemillero";
$mail->Body    = "<p>Estimado(a) Usuario(a), su contraseña de acceso al Sistema Evaluación de Semillero ha sido restablecida correctamente.<br><br>

Su usuario  identificado con la siguiente información:<br>

Sus datos para el acceso son:<br>


<strong>Contraseña: 123456789</strong><br>

Gracias por su registro.<br><br>

Sistema Evaluación de Semillero de Investigación Universidad de Sanbuenaventura <br> No Reenviar este Correo.</p>";
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "El mensaje ha sido enviado";
?>