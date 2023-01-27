


<?php

require_once './modelo/usuariodao.php';
$dao = new UsuarioDao();
$mensaje = "";
if (isset($_POST['identidadid']) & isset($_POST['accesorios'])) {
    $identidadid = htmlspecialchars($_POST['identidadid']);
    $accesorios = htmlspecialchars($_POST['accesorios']);
    if (empty($identidadid) | empty($accesorios)) {
        $mensaje = "Campo Vacio";
    } else {

        $mensaje = $dao->agreacc($identidadid, $accesorios);
    }
}
require_once 'monitoreo.php';
