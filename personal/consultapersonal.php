<?php

include './conexion.php';

function listapersonal()
{

    $conexion = conectar();
    $sql = "select * from personal_institucion";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $array = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $array;
}
