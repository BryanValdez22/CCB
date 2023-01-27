<?php
include '../modelo/usuariodao.php';
require("restablecer/restablecer.php");

$correo = new Restablecer();
$dao = new UsuarioDao();
$usuarios = $dao->listaCorreoenvio();
$mensaje = "";
$tam = sizeof($usuarios);
$i = '0';
if ($tam <> 0) {


    for ($i = 0; $i < $tam; $i++) {

        if ($usuarios[$i]['accion'] == 'No Asistio') {
            echo "<br>";
            foreach ($usuarios as $usuario) {
                $i = $tam;
                echo $correo->enviarRestablecerCorreo($usuario["email"], "123487756", $usuario["prinom"] . " " . $usuario["priapell"], $usuario["grado"], $usuario["identidadid"]);
            }
        }
    }
} else {
    echo "no hay inasistencias";
}

echo $mensaje;
// header("location:../monitoreo/monitoreoPersonal.php");
