<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $usuario = unserialize(base64_decode($_GET['objeto']));
    $identidad_id = $usuario["identidad_id"];
    $pass = $usuario["pass"];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once './modelo/usuariodao.php';
    $dao = new UsuarioDao();
    if (isset($_POST['boton'])) {

        if ($_POST['boton'] == 'guardar') {

            if (isset($_POST['identidad_id']) & isset($_POST['password1']) & isset($_POST['password2'])) {

                $identidad_id = htmlspecialchars($_POST['identidad_id']);
                $password1 = htmlspecialchars($_POST['password1']);
                $pass = htmlspecialchars($_POST['password2']);

                if (empty($identidad_id) | empty($password1) | empty($pass)) {

                    $mensaje = "";
                }
                if ($password1 != $pass) {
                    $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                        "<script>swal.fire({icon: 'warning',title: 'Contraseñas diferentes',})</script>";
                } else {
                    $mensaje = $dao->actualizarUsuario($identidad_id, $pass);
                }
            } else if ($_POST['boton'] == 'limpiar') {

                $identidad_id = "";
                $password1 = "";
                $pass = "";
                $mensaje = "";
            }
        }
    }
}


require_once 'modificarpassword.php';
