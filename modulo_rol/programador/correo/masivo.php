<?php
require_once '../consulta.php';
require("restablecer/restablecer.php");

$correo = new Restablecer();
$consulta = ListaCorreo();
$mensaje = "";
$tam = sizeof($consulta);
// echo var_dump($consulta);
$i = '0';
if ($tam <> 0) {


    for ($i = 0; $i < $tam; $i++) {

        if ($consulta[$i]['accion'] == 'x') {
            echo "<br>";
            foreach ($consulta as $usuario) {
                $i = $tam;
                echo $correo->enviarRestablecerCorreo($usuario["email"], "123487756", $usuario["prinom"] . " " . $usuario["priapell"], $usuario["grado"], $usuario["identidadid"]);
            }
        }
    }
} else {
    echo "no hay inasistencias";
}

echo $mensaje;

header("location: ../monitoreo.php");
