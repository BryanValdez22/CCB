<?php
include 'consulta.php';
$consulta = listausuario();
$administrador = listaAdmin();
$tam = sizeof($consulta);
$ta = sizeof($administrador);
session_start();
session_regenerate_id();
$usuario = $_POST['identidad_id'];
$pass = $_POST['pass'];



for ($i = 0; $i < $tam; $i++) {
    if ($usuario == $consulta[$i]['identidad_id'] && $pass == $consulta[$i]['pass']) {

        switch ($hola = $consulta[$i]['id_nivel']) {
            case 3:
                $_SESSION['usuario'] = $usuario["identidad_id"];
                $_SESSION['rol'] = 3;
                header("location: modulo_rol/programador/configuracion.php");
                break;
            case  1:
                $_SESSION['usuario'] = $usuario["identidad_id"];
                $_SESSION['rol'] = 1;
                header("location: modulo_rol/administrador/configuracion.php");
                break;
        }
    } else {
        echo "<script>swal.fire({icon: 'error', title: 'Usuario Incorrecto', footer: 'intente Nuevamente o Contacte al Administrador'});</script>";
        require_once 'login1.php';
    }
}
for ($i = 0; $i < $ta; $i++) {
    if ($usuario == $administrador[$i]['identidad_id'] && $pass == $administrador[$i]['pass']) {

        switch ($admin = $administrador[$i]['id_admin']) {
            case 5:
                $_SESSION['usuario'] = $usuario["identidad_id"];
                $_SESSION['rol'] = 5;
                header("location: modulo_rol/monitoreo/manejogestiones.php");
                break;
            case 6:
                $_SESSION['usuario'] = $usuario["identidad_id"];
                $_SESSION['rol'] = 6;
                header("location: modulo_rol/docente/configuracion.php");
                break;

            case 4:
                $_SESSION['usuario'] = $usuario["identidad_id"];
                $_SESSION['rol'] = 1;
                header("location: modulo_rol/administrador/configuracion.php");

                break;
        }
    } else {
        echo "<script>swal.fire({icon: 'error', title: 'Usuario Incorrecto', footer: 'intente Nuevamente o Contacte al Administrador'});</script>";
        require_once 'login1.php';
    }
}
