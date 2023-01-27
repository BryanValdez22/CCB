<?php
require_once './modelo/usuariodao.php';
$dao = new UsuarioDao();
if (isset($_POST['boton'])) {
    if ($_POST['boton'] == 'guardar') {

        if (isset($_POST['identidadid']) & isset($_POST['prinom']) & isset($_POST['segnom']) & isset($_POST['priapell']) & isset($_POST['segapell']) & isset($_POST['telefono'])) {

            $identidadid = htmlspecialchars($_POST['identidadid']);
            $prinom = htmlspecialchars($_POST['prinom']);
            $segnom = htmlspecialchars($_POST['segnom']);
            $priapell = htmlspecialchars($_POST['priapell']);
            $segapell = htmlspecialchars($_POST['segapell']);
            $telefono = htmlspecialchars($_POST['telefono']);

            if (empty($identidadid) | empty($prinom) | empty($priapell) | empty($segapell) | empty($telefono)) {
                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'warning', title: 'Campo Vacio',})</script>";
            } else {
                $mensaje = $dao->insertarPersonal($identidadid, $prinom, $segnom, $priapell, $segapell, NULL, NULL, 4, NULL, NULL, NULL, NULL, $telefono);
            }
        }
    } else if ($_POST['boton'] == 'limpiar') {

        $identidadid = "";
        $prinom = "";
        $segnom = "";
        $priapell = "";
        $segapell = "";
        $telefono = "";
        $mensaje = "";
    }
}
require_once 'registrovisita.php';
