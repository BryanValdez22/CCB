<?php
include 'usuariodao.php';
$dao=new UsuarioDao();
echo "<br>";

$usuarios=$dao->listausuarios();
$tam=sizeof($usuarios);
if($tam==0){
    echo "Sin Usuarios";
}
else{
echo "<br>";

foreach($usuarios as $usuario){

    echo "***************************************"."<br>".
        "Numid: ".$usuario["numid"]."<br>".   
         "Nombre: ".$usuario["nombre"]."<br>".
         "Apellido: ".$usuario["apellido"]."<br>".
         "email: ".$usuario["mail"]."<br>".
         "***************************************"."<br>";
}
}