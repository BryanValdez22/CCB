<?php
//require("./util/phpmailer/phpmailer/src/restablecer.php");
require("./restablecer/restablecer.php");

$correo = new Restablecer();
echo $correo->enviarRestablecerCorreo("jaravaldezbryan2016@gmail.com", "123487756", "Carlos Jose Caceres Ochoa", "jkafakfbakfakfnafmfgaskln", "hola");
