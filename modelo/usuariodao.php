<?php

include './modelo/conexion.php';

class UsuarioDao extends Conexion
{

    public function InsertarUsuario($identidad_id, $pass, $nivel)
    {
        $mensaje = "";
        try {
            $conexion = Conexion::conectar();
            // conexion a la base de datos
            $sql = "INSERT INTO usuario_sistem (identidad_id, pass, id_nivel) VALUES (:identidad_id, :pass, :nivel);";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":identidad_id", $identidad_id);
            $stmt->bindParam(":pass", $pass);
            $stmt->bindParam(":nivel", $nivel);
            $stmt->execute();
            $fila = $stmt->rowCount();
            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'success',title: 'Agrego usuario con exito',})</script>";
        } catch (PDOException $e) {

            if ($e->errorInfo[1] == 1062) {

                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'warning', title: 'Usuario Existe',})</script>";
                // duplicate entry, do something else
            } else {
                // an error other than duplicate entry occurred
                echo $e->errorInfo[1];
            }
        }
        return $mensaje;
    }

    public function listaUsuarios()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT usuario_sistem.identidad_id, nivel.nom_nivel FROM usuario_sistem,nivel WHERE usuario_sistem.id_nivel=nivel.id_nivel";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }

    public function listausuario($identidad_id)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM usuario_sistem where identidad_id=:identidad_id;";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":identidad_id", $identidad_id);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }
    public function Listapersonal()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT personal_institucion.identidadid, concat(personal_institucion.prinom,' ',personal_institucion.segnom) AS 
        nombres, concat(personal_institucion.priapell,' ',personal_institucion.segapell) AS 
        apellidos, personal_institucion.fechanacimiento,personal_institucion.grado,cargo.nombrecargo,personal_institucion.idciudad,personal_institucion.barrio,personal_institucion.direccion,personal_institucion.email,personal_institucion.telefono
         FROM personal_institucion,cargo WHERE personal_institucion.cargoid=cargo.cargoid AND cargo.nombrecargo <> 'visitante';";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }
    public function PersonalLista($identidadid)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM personal_institucion where identidadid=:identidadid;";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":identidadid", $identidadid);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }

    public function actualizarUsuario($identidad_id, $pass)
    {

        $mensaje = "";
        try {

            $conexion = Conexion::conectar();
            $sql = "UPDATE usuario_sistem SET pass=:pass WHERE identidad_id=:identidad_id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":identidad_id", $identidad_id);
            $stmt->bindParam(":pass", $pass);
            $stmt->execute();

            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'success',title: 'Actualizo con exito',})</script>";
        } // fin de try

        catch (PDOException $e) {

            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'error',title: 'Problemas al actualizar la contraseña',})</script>";
        } // fin del catch

        return $mensaje;
    } // fin del metodo       


    public function eliminarUsuario($identidad_id)
    {
        $mensaje = "";
        try {

            $conexion = Conexion::conectar();
            $sql = "DELETE from usuario_sistem where identidad_id=:identidad_id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":identidad_id", $identidad_id);
            $stmt->execute();
            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'success',title: 'Elimino usuario con exito',})</script>";
        } // fin del try

        catch (PDOException $e) {
            $mensaje = "Problemas al Eliminar consulte con el administrador";
        } // fin del catch

        return $mensaje;
    } // fin del metodo eliminarUsuario


    public function eliminarUsuarios()
    {
        $mensaje = "";
        try {

            $conexion = Conexion::conectar();
            $sql = "delete from usuario_sistem";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $mensaje = "Eliminó, Usuarios con Exito";
        } // fin del try

        catch (PDOException $e) {
            $mensaje = "Problemas al Eliminar consulte con el administrador";
        } // fin del catch

        return $mensaje;
    } // fin del metodo eliminarUsuario

    public function listaEmpresa()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM datos_empresa;";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }

    public function insertarEmpresa($nombre, $nit, $ciudad, $departamento, $codigopostal, $direccion, $email, $telefono)
    {
        $mensaje = "";
        try {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO datos_empresa (nombre, nit, ciudad, departamento, codigopostal, direccion, email, telefono) VALUES 
            (:nombre, :nit, :ciudad, :departamento, :codigopostal, :direccion, :email, :telefono)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":nit", $nit);
            $stmt->bindParam(":ciudad", $ciudad);
            $stmt->bindParam(":departamento", $departamento);
            $stmt->bindParam(":codigopostal", $codigopostal);
            $stmt->bindParam(":direccion", $direccion);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telefono", $telefono);
            $stmt->execute();
            $fila = $stmt->rowCount();

            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'success', title: 'Guardo empresa con Exito',})</script>";
        } catch (PDOException $e) {

            if ($e->errorInfo[1] == 1062) {
                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'warning', title: 'Empresa existe',})</script>";
                // duplicate entry, do something else
            } else {
                // an error other than duplicate entry occurred
                echo $e->errorInfo[1];
            }
        }
        return $mensaje;
    } // fn de clase

    public function insertarPersonal($identidadid, $prinom, $segnom, $priapell, $segapell, $fechanacimiento, $grado, $cargoid, $idciudad, $barrio, $direccion, $email, $telefono)
    {
        $mensaje = "";
        try {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO personal_institucion (identidadid, prinom, segnom, priapell, segapell, fechanacimiento, grado, cargoid, idciudad, barrio, direccion, email, telefono) VALUES 
            (:identidadid, :prinom, :segnom, :priapell, :segapell, :fechanacimiento, :grado, :cargoid, :idciudad, :barrio, :direccion, :email, :telefono)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":identidadid", $identidadid);
            $stmt->bindParam(":prinom", $prinom);
            $stmt->bindParam(":segnom", $segnom);
            $stmt->bindParam(":priapell", $priapell);
            $stmt->bindParam(":segapell", $segapell);
            $stmt->bindParam(":fechanacimiento", $fechanacimiento);
            $stmt->bindParam(":grado", $grado);
            $stmt->bindParam(":cargoid", $cargoid);
            $stmt->bindParam(":idciudad", $idciudad);
            $stmt->bindParam(":barrio", $barrio);
            $stmt->bindParam(":direccion", $direccion);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telefono", $telefono);
            $stmt->execute();
            $fila = $stmt->rowCount();
            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'success', title: 'Guardo Personal con Exito',})</script>";
        } catch (PDOException $e) {


            if ($e->errorInfo[1] == 1062) {
                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'success', title: 'persona existe',})</script>";

                // duplicate entry, do something else
            } else {
                // an error other than duplicate entry occurred
                echo $e->errorInfo[1];
            }
        }
        return $mensaje;
    }

    public function actualizarPersonal($identidadid, $prinom, $segnom, $priapell, $segapell, $fechanacimiento, $grado, $cargoid, $idciudad, $barrio, $direccion, $email, $telefono)
    {
        $mensaje = "";
        try {
            $conexion = Conexion::conectar();
            $sql = "UPDATE personal_institucion SET 
            identidadid=:identidadid ,prinom=:prinom, segnom=:segnom, priapell=:priapell, fechanacimiento=:fechanacimiento, grado=:grado, cargoid=:cargoid, idciudad=:idciudad, barrio=:barrio, direccion=:direccion, email=:email, telefono=:telefono WHERE identidadid=:identidadid";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":identidadid", $identidadid);
            $stmt->bindParam(":prinom", $prinom);
            $stmt->bindParam(":segnom", $segnom);
            $stmt->bindParam(":priapell", $priapell);
            $stmt->bindParam(":segapell", $segapell);
            $stmt->bindParam(":fechanacimiento", $fechanacimiento);
            $stmt->bindParam(":grado", $grado);
            $stmt->bindParam(":cargoid", $cargoid);
            $stmt->bindParam(":idciudad", $idciudad);
            $stmt->bindParam(":barrio", $barrio);
            $stmt->bindParam(":direccion", $direccion);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telefono", $telefono);
            $stmt->execute();
            $mensaje = "Actualizo con exito";
        } catch (PDOException $e) {
            $mensaje = "Problemas al actualizar personal";
        }
        return $mensaje;
    }

    public function eliminarPersonal($identidadid)
    {
        $mensaje = "";
        try {

            $conexion = Conexion::conectar();
            $sql = "DELETE from personal_institucion where identidadid=:identidadid";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":identidadid", $identidadid);
            $stmt->execute();
            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'success',title: 'Elimino usuario con exito',})</script>";
        } // fin del try

        catch (PDOException $e) {
            $mensaje = "Problemas al Eliminar consulte con el administrador";
        } // fin del catch

        return $mensaje;
    } // fin del metodo eliminarUsuario


    public function agregarExcusa($identidadid, $exc, $fecha)
    {
        $mensaje = "";
        try {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO excusa (exc) VALUES (:identidadid, :fecha, :excusa);";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":identidadid", $identidadid);
            $stmt->bindParam(":fecha", $fecha);
            $stmt->bindParam(":excusa", $exc);
            $stmt->execute();
            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'success', text: 'Guardo Excusa con Exito',})</script>";
        } catch (PDOException $e) {

            if ($e->errorInfo[1] == 1062) {

                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'warning', title: 'excusa existe',})</script>";

                // duplicate entry, do something else
            } else {
                // an error other than duplicate entry occurred
                echo $e->errorInfo[1];
            }
        }
        return $mensaje;
    }

    public function agreacc($identidadid, $accesorios)
    {
        $mensaje = "";
        try {
            $conexion = Conexion::conectar();
            $sql = "UPDATE historial_ingreso SET accesorios =:accesorios WHERE ididentidad =:ididentidad AND fecha = CURDATE()";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":ididentidad", $identidadid);
            $stmt->bindParam(":accesorios", $accesorios);
            $stmt->execute();
            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'success', text: 'Guardo Accesorio con Exito',})</script>";
        } catch (PDOException $e) {

            if ($e->errorInfo[1] == 1062) {

                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'warning', title: 'accesorio existe',})</script>";

                // duplicate entry, do something else
            } else {
                // an error other than duplicate entry occurred
                echo $e->errorInfo[1];
            }
        }
        return $mensaje;
    }

    public function listaMonitoreo()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM vistamonitoreo;";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }

    public function agregarInstitucion($institucion)
    {
        $mensaje = "";
        try {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO ";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam("institucion:", $institucion);
        } catch (PDOException $e) {
        }
    }
    public function listaHistorial()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM historial_ingreso";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }

    public function agreHistorial($ididentidad, $fecha, $accesorios, $hora, $accion)
    {
        $mensaje = "";
        try {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO historial_ingreso (ididentidad, accesorios) VALUES (:fecha,:accesorios,:hora,:accion);";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":ididentidad", $ididentidad);
            $stmt->bindParam(":fecha", $fecha);
            $stmt->bindParam(":accesorios", $accesorios);
            $stmt->bindParam(":hora", $hora);
            $stmt->bindParam(":accion", $accion);
            $mensaje = "";
        } catch (PDOException $e) {

            if ($e->errorInfo[1] == 1062) {

                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'error',title: 'Error' ,text: 'id no existente',})</script>";

                // duplicate entry, do something else
            } else {
                // an error other than duplicate entry occurred
                echo $e->errorInfo[1];
            }
        }
        return $mensaje;
    }

    public function visitanteVista()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM personal_institucion WHERE cargoid=4;";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }

    public function listaComparar()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT DISTINCT personal_institucion.identidadid,cargo.nombrecargo,historial_ingreso.fecha,historial_ingreso.accion FROM 
        personal_institucion,cargo,historial_ingreso WHERE 
        personal_institucion.cargoid=cargo.cargoid AND 
        cargo.nombrecargo <> 'visitante' AND 
        historial_ingreso.fecha = curdate();";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }

    public function listHistory()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT DISTINCT personal_institucion.identidadid,cargo.nombrecargo,historial_ingreso.fecha,historial_ingreso.accion FROM 
        personal_institucion,cargo,historial_ingreso WHERE 
        personal_institucion.cargoid=cargo.cargoid AND 
        cargo.nombrecargo <> 'visitante' AND 
        historial_ingreso.fecha = curdate() AND
        historial_ingreso.ididentidad=personal_institucion.identidadid;";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }

    public function insertarInasistencia($identidad_id, $fecha, $accesorio, $hora)
    {
        $mensaje = "";
        try {
            $conexion = Conexion::conectar();
            // conexion a la base de datos
            $sql = "INSERT INTO historial_ingreso (ididentidad,fecha,accesorios,hora,accion) VALUES (:ididentidad, :fecha, :accesorios,:hora,'No Asistio');";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":ididentidad", $identidad_id);
            $stmt->bindParam(":fecha", $fecha);
            $stmt->bindParam(":accesorios", $accesorio);
            $stmt->bindParam(":hora", $hora);
            $stmt->execute();
            $fila = $stmt->rowCount();
            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'success',title: 'Agrego usuario con exito',})</script>";
        } catch (PDOException $e) {

            if ($e->errorInfo[1] == 1062) {

                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'warning', title: 'Usuario Existe',})</script>";
                // duplicate entry, do something else
            } else {
                // an error other than duplicate entry occurred
                echo $e->errorInfo[1];
            }
        }
        return $mensaje;
    }

    public function listaCorreoenvio()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM `vistacorrreo` WHERE 1;";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }

    public function listaAsistio()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT excusas.id_identidad,excusas.excusa,historial_ingreso.fecha,historial_ingreso.accion FROM 
        historial_ingreso,excusas WHERE historial_ingreso.ididentidad=excusas.id_identidad;";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }
    public function listaExcusas()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM excusas;";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $array;
    }

    public function insertarExcusa($id, $no, $excusa)
    {
        $mensaje = "";
        try {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO excusas (id_identidad, fecha, excusa) VALUES (:id_identidad,:fecha,:excusa);";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':id_identidad', $id);
            $stmt->bindParam(':fecha', $no);
            $stmt->bindParam(':excusa', $excusa);
            $stmt->execute();
            $fila = $stmt->rowCount();
            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                "<script>swal.fire({icon: 'success', title: 'Guardo Excusa con Exito',})</script>";
        } catch (PDOException $e) {


            if ($e->errorInfo[1] == 1062) {
                $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                    "<script>swal.fire({icon: 'success', title: 'Excusa existe',})</script>";

                // duplicate entry, do something else
            } else {
                // an error other than duplicate entry occurred
                echo $e->errorInfo[1];
            }
        }
        return $mensaje;
    }
}
