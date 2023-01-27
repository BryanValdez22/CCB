<?php
require("PHPMailer.php");
require("SMTP.php");
require("Exception.php");

class Restablecer{

public function enviarRestablecerCorreo($correo,$pass,$nomapel){

	$mensaje="";
	$mail = new PHPMailer\PHPMailer\PHPMailer();

	$mail->IsSMTP();    
	 $mail->SMTPSecure = 'tls';                                // Configurar email para utilizar SMTP
	//$mail->Host = "smtp.gmail.com";  // Especificar servidor principal y de copia.
	$mail->Host = "smtp.office365.com";
    $mail->Port = 587; 
	$mail->CharSet = 'UTF-8';
	$mail->SMTPAuth = true;     // Activar la autenticación SMTP
	$mail->Username = "carlos.caceres@usbctg.edu.co";  // SMTP usuario
	$mail->Password = "carcaco741852"; // SMTP contraseña
	//$mail->Port = 587; // or 587
	$mail->From = "robotsemillerousb@usbctg.edu.co";
	$mail->FromName = "Robot Sistema semillero Usb";
	$mail->AddAddress($correo, $nomapel);
	/*
	$mail->AddAddress("ellen@example.com");                  // name is optional
	$mail->AddReplyTo("info@example.com", "Information");
	*/
	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
	//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
	$mail->IsHTML(true);                                  // set email format to HTML

	$mail->Subject = "Restablecer Contraseña Sistema de Evaluación Semillero Universidad de Sanbuenaventura";
	$mail->Body    = "<p>Estimado(a) Usuario(a) <strong>".$nomapel. "</strong>, su contraseña de acceso al Sistema Evaluación de Semillero ha sido restablecida correctamente.<br><br>

	Su usuario  identificado con la siguiente información:<br>

	Sus datos para el acceso son:<br>


	<strong>Contraseña: ".$pass."</strong><br>

	Gracias por su registro.<br><br>

	Sistema Evaluación de Semillero de Investigación Universidad de Sanbuenaventura <br> No Reenviar este Correo.</p>";
	//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

	if(!$mail->Send())
	{
	   $mensaje="Problemas al Enviar Correo de Restablecimiento por Favor Consultar al Administrador";
	}

	$mensaje="El mensaje ha sido enviado al Correo Electronico";
	return $mensaje;

	}



}

?>