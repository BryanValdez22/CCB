<?php

if ($_SERVER["REQUEST_METHOD"] == 'GET') {

    $identidadid = base64_decode($_GET['identidadid']);
    require_once './modelo/usuariodao.php';
    $dao = new UsuarioDao();
    $dao->eliminarPersonal($identidadid);
    require_once 'vistavisitante.php';
}
