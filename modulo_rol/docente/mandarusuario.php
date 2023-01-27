<?php
require_once './modelo/usuariodao.php';
$dao = new UsuarioDao();
if (isset($_POST['boton'])) {

    if ($_POST['boton'] == 'guardar') {


        if (isset($_POST['identidad_id']) & isset($_POST['pass']) & isset($_POST['id_nivel'])) {

            $identidad_id = htmlspecialchars($_POST['identidad_id']);
            $pass = htmlspecialchars($_POST['pass']);
            $nivel = htmlspecialchars($_POST['id_nivel']);
            // $consulta = $dao->listausuario($identidad_id);


            if (empty($identidad_id) | empty($pass) | empty($nivel)) {
                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'warning', title: 'Campo Vacio',})</script>";
            } else {

                $mensaje = $dao->InsertarUsuario($identidad_id, $pass, $nivel);
            }
        }
    } else if ($_POST['boton'] == 'limpiar') {

        $identidad_id = "";
        $pass = "";
        $nivel = "";
        $mensaje = "";
    }
}

require_once 'crearusuario.php';
