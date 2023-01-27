<?php

require_once './modelo/usuariodao.php';
// ------------tabla usuarios-------------
$dao = new UsuarioDao();
$usuarios = $dao->listaUsuarios();
$tam = sizeof($usuarios);

// ------------tabla vista monitoreo-------------

$dao = new UsuarioDao();
$monitoreo = $dao->listaMonitoreo();
$tam = sizeof($monitoreo);

// ---------------tabla personal-----------------

$dao = new UsuarioDao();
$personal = $dao->Listapersonal();
$tam = sizeof($personal);

// ---------------tabla visitante-----------------

$dao = new UsuarioDao();
$visitante = $dao->visitanteVista();
$tam = sizeof($visitante);

// -----------------tabla historial_ingreso----------------

$dao = new UsuarioDao();
$historial = $dao->listaHistorial();
$tam = sizeof($historial);
