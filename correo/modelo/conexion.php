<?php

class Conexion{

public function conectar(){
	    $bd="senadb";
		$host="mysql:host=localhost:3306;charset=utf8;dbname=".$bd;
		$usuario="root";
		$password="";
		$link = new PDO($host,$usuario,$password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		return $link;	
	}

}


?>