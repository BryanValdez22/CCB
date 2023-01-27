<?php

require_once './modelo/usuariodao.php';
$dao = new UsuarioDao();
$usuarios = $dao->listHistory();
$tam = sizeof($usuarios);

$mensaje = "";

$accesorio = "";
//////////////////LISTA*PERSONAL////////////////////////
$usuari = $dao->listaComparar();
$ta = sizeof($usuari);
echo $ta . 'x';
echo $tam . 'e';
$fecha = date('yy-m-d');
////////////////////////////////
date_default_timezone_set('America/Bogota');
$hora = date("H:i:s");


$identidad_id = "";
//echo $fecha.":<br>";
//echo $hora."<br>";
$cont = 1;

for ($i = 0; $i < $ta; $i++) {
    if ($fecha == isset($usuarios[$i]['fecha'])) {
        echo "k";
    } else {
        $var = $usuari[$i]['identidadid'];
        $vr = $usuari[$i]['nombrecargo'];
        $identidad_id = $var;

        $mensaje = $dao->insertarInasistencia($identidad_id, $fecha, $accesorio, $hora);
    }
}

header("location: correo/masivo.php");
