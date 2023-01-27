<?php

include 'conexion.php';

function listausuario()
{

	$conexion = conectar();
	$sql = "select * from usuario_sistem;";
	$stmt = $conexion->prepare($sql);
	$stmt->execute();
	$array = $stmt->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

function listaAdmin()
{

	$conexion = conectar();
	$sql = "select * from vistadministrador;";
	$stmt = $conexion->prepare($sql);
	$stmt->execute();
	$array = $stmt->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

function listaCorreo()
{
	$conexion = conectar();
	$sql = "SELECT DISTINCT personal_institucion.identidadid,personal_institucion.email,
    personal_institucion.prinom,personal_institucion.priapell,cargo.nombrecargo,historial_ingreso.accion,
    historial_ingreso.fecha,personal_institucion.grado 
    FROM personal_institucion, historial_ingreso,cargo
     where historial_ingreso.ididentidad=personal_institucion.identidadid 
     AND personal_institucion.cargoid=cargo.cargoid 
     and cargo.nombrecargo='estudiante' 
     AND historial_ingreso.accion='x' 
      and 
    historial_ingreso.fecha=curdate()";
	$stmt = $conexion->prepare($sql);
	$stmt->execute();
	$array = $stmt->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}
