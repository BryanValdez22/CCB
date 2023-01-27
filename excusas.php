<?php
require_once './modelo/usuariodao.php';
$dao = new UsuarioDao();
$consulta = $dao->listaExcusas();
$tam = sizeof($consulta);

$asistio = $dao->listaAsistio();
$ta = sizeof($asistio);

require_once 'asistencias.php';
