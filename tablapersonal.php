<?php
require_once './modelo/usuariodao.php';
$dao = new UsuarioDao();
$personal = $dao->Listapersonal();
$tam = sizeof($personal);
require_once 'gestionpersonal.php';
