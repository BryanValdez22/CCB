<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $excusa = unserialize(base64_decode($_GET['objeto']));
    $exc = $excusa["excusa"];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once './modelo/usuariodao.php';
    $dao = new UsuarioDao();
    $feha = date('Y-m-d');
    if (isset($_POST['boton'])) {

        if ($_POST['boton'] == 'guardar') {

            $mensaje = $dao->agregarExcusa($identidadid, 'exc ^', $fecha);
        }
    }
}
require_once 'asistencias.php';
