<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $persona = unserialize(base64_decode($_GET['objeto']));
    $identidadid = $persona["identidadid"];
    $prinom = $persona["prinom"];
    $segnom = $persona["segnom"];
    $priapell = $persona["priapell"];
    $segapell = $persona["segapell"];
    $fechanacimiento = $persona["fechanacimiento"];
    $grado = $persona["grado"];
    $cargoid = $persona["cargoid"];
    $barrio = $persona["barrio"];
    $idciudad = $persona["idciudad"];
    $direccion = $persona["direccion"];
    $email = $persona["email"];
    $telefono = $persona["telefono"];

    // foreach ($personal as $persona) {

    // }

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once './modelo/usuariodao.php';
    $dao = new UsuarioDao();
    if (isset($_POST['boton'])) {

        if ($_POST['boton'] == 'guardar') {

            if (isset($_POST['identidadid']) && isset($_POST['prinom']) & isset($_POST['segnom']) & isset($_POST['priapell']) & isset($_POST['segapell']) & isset($_POST['fechanacimiento']) & isset($_POST['grado']) & isset($_POST['cargoid']) & isset($_POST['idciudad']) & isset($_POST['barrio']) & isset($_POST['direccion']) & isset($_POST['email']) & isset($_POST['telefono'])) {

                $identidadid = htmlspecialchars($_POST['identidadid']);
                $prinom = htmlspecialchars($_POST['prinom']);
                $segnom = htmlspecialchars($_POST['segnom']);
                $priapell = htmlspecialchars($_POST['priapell']);
                $segapell = htmlspecialchars($_POST['segapell']);
                $fechanacimiento = htmlspecialchars($_POST['fechanacimiento']);
                $grado = htmlspecialchars($_POST['grado']);
                $cargoid = htmlspecialchars($_POST['cargoid']);
                $idciudad = htmlspecialchars($_POST['idciudad']);
                $barrio = htmlspecialchars($_POST['barrio']);
                $direccion = htmlspecialchars($_POST['direccion']);
                $email = htmlspecialchars($_POST['email']);
                $telefono = htmlspecialchars($_POST['telefono']);

                if (empty($identidadid) | empty($prinom) | empty($priapell) | empty($segapell) | empty($fechanacimiento) | empty($grado) | empty($cargoid) | empty($idciudad) | empty($barrio) | empty($direccion) | empty($email)) {

                    $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                        "<script>swal.fire({icon: 'warning',title: 'Campo vacio',})</script>";
                } else {
                    $mensaje = $dao->actualizarPersonal($identidadid, $prinom, $segnom, $priapell, $segapell, $fechanacimiento, $grado, $cargoid, $idciudad, $barrio, $direccion, $email, $telefono);
                }
            }
        } else if ($_POST['boton'] == 'limpiar') {
            $identidadid = "";
            $prinom = "";
            $segnom = "";
            $priapell = "";
            $segapell = "";
            $fechanacimiento = "";
            $grado = "";
            $cargoid = "";
            $idciudad = "";
            $barrio = "";
            $direccion = "";
            $email = "";
            $telefono = "";
            $mensaje = "";
        }
    }
}

require_once 'personalactualizar.php';
