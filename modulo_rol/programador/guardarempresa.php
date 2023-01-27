<?php
require_once './modelo/usuariodao.php';
$dao = new UsuarioDao();
$listempresa = $dao->listaEmpresa();
if (isset($_POST['boton'])) {

    if ($_POST['boton'] == 'guardar') {


        if (isset($_POST['nombre']) & isset($_POST['nit']) & isset($_POST['ciudad']) & isset($_POST['departamento']) & isset($_POST['codigopostal']) & isset($_POST['direccion']) & isset($_POST['email']) & isset($_POST['telefono'])) {

            $nombre = htmlspecialchars($_POST['nombre']);
            $nit = htmlspecialchars($_POST['nit']);
            $ciudad = htmlspecialchars($_POST['ciudad']);
            $departamento = htmlspecialchars($_POST['departamento']);
            // $encabezado = htmlspecialchars($_POST['encabezado']);
            $codigopostal = htmlspecialchars($_POST['codigopostal']);
            $direccion = htmlspecialchars($_POST['direccion']);
            $email = htmlspecialchars($_POST['email']);
            $telefono = htmlspecialchars($_POST['telefono']);
            // $logotipo = htmlspecialchars($_POST['logotipo']);

            if (empty($nombre) | empty($nit) | empty($ciudad) | empty($departamento) | empty($codigopostal) | empty($direccion) | empty($email) | empty($telefono)) {
                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'warning', title: 'Campo Vacio',})</script>";
            } else {

                if (empty($listempresa)) {

                    $mensaje = $dao->insertarEmpresa($nombre, $nit, $ciudad, $departamento, $codigopostal, $direccion, $email, $telefono);
                } else {
                    $mensaje =  "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                        "<script>swal.fire({icon: 'warning', title: 'Error', text: 'No se permite mas de una empresa',})</script>";
                }
            }
        } else if ($_POST['boton'] == 'borrar') {

            $nombre = "";
            $nit = "";
            $ciudad = "";
            $departamento = "";
            $codigopostal = "";
            $departamento = "";
            $email = "";
            $telefono = "";
            $mensaje = "";
        }
    }
}
require_once 'datosempresa.php';
