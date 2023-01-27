<?php

require_once '../../.././personal/modelo/personaldao.php';

$dao = new UsuarioDao();
//    $consulempresa=$dao->agregarInstitucion();


if (isset($_POST['boton'])) {
    if ($_POST['boton'] == 'Guardar') {



        if (
            isset($_POST['nombre']) & isset($_POST['nit']) & isset($_POST['ciudad']) & isset($_POST['codigo']) & isset($_POST['direccion'])
            & isset($_POST['email']) & isset($_POST['tel'])
        ) {

            $nombre = htmlspecialchars($_POST['nombre']);
            $nit = htmlspecialchars($_POST['nit']);
            $ciudad = htmlspecialchars($_POST['ciudad']);
            $codigo = htmlspecialchars($_POST['codigo']);
            $direccion = htmlspecialchars($_POST['direccion']);
            $telefono = htmlspecialchars($_POST['tel']);
            $email = htmlspecialchars($_POST['email']);

            if (
                empty($nombre) || empty($nit) || empty($ciudad) || empty($codigo) || empty($direccion)
                || empty($email) || empty($telefono)
            ) {
                $mensaje = "Campo Vacio";
            } else {

                if (empty($consulempresa)) {
                    $mensaje = $dao->agregarInstitucion($nombre, $nit, $ciudad, $codigo, $direccion, $telefono, $email, $nombre_imagen);
                } else {
                    $mensaje = "Error, NO es permitido más de una institución.";
                }
            }
        }
    }
}
require_once '../../.././personal/empresa.php';

