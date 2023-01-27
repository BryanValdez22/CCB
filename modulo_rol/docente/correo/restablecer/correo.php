<?php
require("../../util/phpmailer/phpmailer/src/restablecer.php"); 

class Correo{

	function enviarRestablecerCorreo($correo,$pass){
		$restablecer=new Restablecer();
		return $restablecer->enviarRestablecerCorreo($correo,$pass);
	}

}