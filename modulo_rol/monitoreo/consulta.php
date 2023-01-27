<?php

include 'conexion.php';

function listausuario()
{

	$conexion = conectar();
	$sql = "select * from usuario_sistem";
	$stmt = $conexion->prepare($sql);
	$stmt->execute();
	$array = $stmt->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

function listaAdmin()
{

	$conexion = conectar();
	$sql = "SELECT * FROM vistadministrador";
	$stmt = $conexion->prepare($sql);
	$stmt->execute();
	$array = $stmt->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}
