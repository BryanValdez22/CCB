<?php

include 'conexion.php';

 class UsuarioDao extends Conexion{

    public function insertarUsuario($numid,$nombre,$apellido){
        $mensaje="";
  try {
           $conexion=Conexion::conectar();
          $sql="INSERT INTO usuario(numid,nombre,apellido) VALUES (:numid,:nombre,:apellido);";
          
          $stmt = $conexion->prepare($sql);	
              $stmt->bindParam(":numid", $numid);
              $stmt->bindParam(":nombre",$nombre);
              $stmt->bindParam(":apellido",$apellido);                
              $stmt->execute();
              $fila=$stmt->rowCount();      
                    $mensaje="Guardo, Usuario con Exito!!";        
              
  } catch(PDOException $e) {
       
          if ($e->errorInfo[1] == 1062) {
           $mensaje="Usuario Existe!!";
            // duplicate entry, do something else
         } else {
            // an error other than duplicate entry occurred
          echo $e->errorInfo[1];
         }
     
  } 
      return $mensaje;
      }

      public function listausuarios(){
        $conexion=Conexion::conectar();         
        $sql="SELECT * FROM usuario order by numid asc;";      
        $stmt = $conexion->prepare($sql); 
        $stmt->execute();
        $array=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;  
        return $array;     
       }

       public function listausuario($numid){
        $conexion=Conexion::conectar();         
        $sql="SELECT * FROM usuario where numid=:numid order by numid asc;";      
        $stmt = $conexion->prepare($sql); 
        $stmt->bindParam(":numid", $numid);
        $stmt->execute();
        $array=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;  
        return $array;     
       }

       public function actualizarUsuario($numid,$nombre,$apellido){

        $mensaje="";
        try{
          
          $conexion=Conexion::conectar();
          $sql="update usuario set nombre=:nombre,apellido=:apellido where numid=:numid";
          $stmt=$conexion->prepare($sql);
          $stmt->bindParam(":nombre",$nombre);
          $stmt->bindParam(":apellido",$apellido);
          $stmt->bindParam(":numid",$numid);
          $stmt->execute();
          $mensaje="Actualizo Usuario con Exito!!";

        }// fin de try

        catch(PDOException $e){

          $mensaje="Problemas al Actualizar Consulte con el Administrador del Sistema!!";

        }// fin del catch

        return $mensaje;

       }// fin del metodo       


      public function eliminarUsuario($numid){
        $mensaje="";
          try{

            $conexion=Conexion::conectar();
            $sql="delete from usuario where numid=:numid";
            $stmt=$conexion->prepare($sql);
            $stmt->bindParam(":numid",$numid);
            $stmt->execute();
            $mensaje="Eliminó, Usuario con Exito";            

          }// fin del try

          catch(PDOException $e){
            $mensaje="Problemas al Eliminar consulte con el administrador";

          }// fin del catch

          return $mensaje;
      }// fin del metodo eliminarUsuario


      public function eliminarUsuarios(){
        $mensaje="";
          try{

            $conexion=Conexion::conectar();
            $sql="delete from usuario";
            $stmt=$conexion->prepare($sql);
            $stmt->execute();
            $mensaje="Eliminó, Usuarios con Exito";            

          }// fin del try

          catch(PDOException $e){
            $mensaje="Problemas al Eliminar consulte con el administrador";

          }// fin del catch

          return $mensaje;
      }// fin del metodo eliminarUsuario



 }// fn de clase