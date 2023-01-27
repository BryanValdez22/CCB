<?php
require "././util/phpmailer/phpmailer/src/PHPMailer.php";
require "././util/phpmailer/phpmailer/src/SMTP.php";
require "././util/phpmailer/phpmailer/src/Exception.php";

class Restablecer
{

	public function enviarRestablecerCorreo($correo, $pass, $nomapel, $grado, $identidad)
	{

		$mensaje = "";
		$mail = new PHPMailer\PHPMailer\PHPMailer();

		$mail->IsSMTP();                                      // Configurar email para utilizar SMTP
		$mail->Host = "smtp.gmail.com";  // Especificar servidor principal y de copia.
		$mail->CharSet = 'UTF-8';
		$mail->SMTPAuth = true;     // Activar la autenticación SMTP 
		$mail->Username = "jaravaldezbryan2016@gmail.com";  // SMTP usuario
		$mail->Password = "brayanvaldez2002"; // SMTP contraseña
		$mail->Port = 587; // or 587
		$mail->From = "jaravaldezbryan2016@gmail.com";
		$mail->FromName = "Robot Sistema de correo SYSTEM";
		$mail->AddAddress($correo, $nomapel);
		/*
	$mail->AddAddress("ellen@example.com");                  // name is optional
	$mail->AddReplyTo("info@example.com", "Information");
	*/
		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
		//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
		//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
		$mail->IsHTML(true);                                  // set email format to HTML

		$mail->Subject = "Notificacion De Inasistencia De La Institucion Educativa Bertha Suttner";
		$mail->Body    = "<p>Estimado(a) Acudiente(a) <strong> </strong>,
    Se Le Informa En La Siguiente Notificacion  Que Su Hijo(a) No  Asistido A La Institucion Por Favor Enviar Una Excusa Donde Notifique La 
    Falta Del Estudiante.<br><br>

	Estudiante identificado con la siguiente información:<br>
    <strong>Identidad: " . $identidad . "</strong><br>
	<strong>Nombre Y Apellido: " . $nomapel . "</strong><br>
    <strong>Grado:" . $grado . "</strong><br>
    <strong>Estado:inasistencia</strong><br>

	.<br><br>

	Sistema De Infotechnology Associations<br>No Reenviar este Correo.</p>";

		if (!$mail->Send()) {
			$mensaje = "Problemas al Enviar Correo de Restablecimiento por Favor Consultar al Administrador";
			echo "Mailer Error: " . $mail->ErrorInfo;
			exit;
		}

		$mensaje = "El mensaje ha sido enviado al Correo Electronico";
		return $mensaje;
	}
}
