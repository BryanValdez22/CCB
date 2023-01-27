<?php
session_start();
$version = $_SESSION['usuario'];
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["rol"] == 6) {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet">
            <script src="https://kit.fontawesome.com/737883520a.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/asistencia.css">
            <title></title>
        </head>
        <style>
            .titulo-fondo {
                text-align: center;
                font-size: 30px;
                font-weight: 600;
                color: #ccc;
            }

            .agre-buscar {
                padding: 10px 20px;
                border: none;
                outline: none;
                background-color: #02b2ff;
                color: #fff;
                border-radius: 3px;
                box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.71);
                font-size: 15px;
                cursor: pointer;
            }
        </style>

        <body>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

                <header>
                    <h2 class="titulo">institucion educativa bertha suttner</h2>
                    <a href="#" id="cerrar-sesion">Cerrar Sesion</a>
                </header>
                <img src="img/empresa.png" alt="empresa" class="img">
                <h2 class="h2-titulo">Asistencias</h2>
                <hr>
                <?php
                if (empty($mensaje) == false) {
                    echo $mensaje;
                }
                ?>
                <div class="bloque">

                    <!-- busqueda en la tabla -->

                    <input class="input" type="search" name="identidad_id" placeholder="Buscar">
                    <button type="submit" class="agre-buscar" value="buscar" name="boton"><i class="fas fa-search"></i> Buscar</button>

                    <input class="input" type="date" name="fecha" placeholder="Selecionar fecha">
                    <button type="submit" class="agre-buscar" value="agregar" name="boton"><i class="fas fa-plus"></i> Agregar excusa</button>
                    <a href="manejogestiones.php" class="atras">Atras</a>
                    <div class="tabla">
                        <?php
                        require_once 'tabla.php';
                        if ($tam == 0) {
                            echo "<p class='titulo-fondo'>No se encontraron excusas</p>";
                        } else {
                        ?>
                            <table style="width: 100%;">
                                <tr>
                                    <thead>
                                        <th>ID</th>
                                        <th>Nombres</th>
                                        <th>Cargo</th>
                                        <th>Fecha</th>
                                        <th>Excusa</th>
                                        <th>Accion</th>
                                    </thead>
                                </tr>
                                <tbody>
                                    <?php
                                    $mensaje = "";
                                    if (isset($_POST['boton'])) {
                                        if ($_POST['boton'] == 'buscar') {
                                            require_once 'conexion.php';
                                            $co = Conectar();
                                            $id = htmlspecialchars($_POST['identidad_id']);
                                            $no = htmlspecialchars($_POST['fecha']);
                                            $sql = "SELECT DISTINCT personal_institucion.identidadid,personal_institucion.prinom,personal_institucion.segnom,personal_institucion.priapell,personal_institucion.segapell,personal_institucion.grado,historial_ingreso.fecha,historial_ingreso.accion 
                                    FROM personal_institucion,historial_ingreso WHERE
                                     historial_ingreso.ididentidad=:id AND 
                                     historial_ingreso.fecha = :fecha AND historial_ingreso.ididentidad=personal_institucion.identidadid";
                                            $stmt = $co->prepare($sql);
                                            $result = $stmt->execute(array(':fecha' => $no, ':id' => $id));
                                            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
                                            if (count($rows)) {
                                                foreach ($rows as $row) {
                                                    echo "<tr>" .
                                                        "<td>" . $row->identidadid . "</td>" .
                                                        "<td>" . $row->prinom . " " . $row->segnom . "</td>" .
                                                        "<td>" . $row->priapell . " " . $row->segapell . "</td>" .
                                                        "<td>" . $row->grado . "</td>" .
                                                        "<td>" . $row->fecha . "</td>" .
                                                        "<td>" . $row->accion . "</td>" .
                                                        "</tr>";
                                                    $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                                                        "<script>swal.fire({
                                                                icon :'info',
                                                                title:'¡Informacion!',
                                                                text:'Estudiante Asistio A La Institucion!',
                                                                
                                                                })</script>";
                                                }
                                            } else {
                                                $sql = "SELECT identidadid, prinom, segnom, priapell, segapell, grado
                                            FROM personal_institucion
                                            WHERE identidadid=:id";
                                                $stmt = $co->prepare($sql);
                                                $result = $stmt->execute(array(':id' => $id));
                                                $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
                                                if (count($rows)) {
                                                    foreach ($rows as $row) {
                                                        echo "<tr>" .
                                                            "<td>" . $row->identidadid . "</td>" .
                                                            "<td>" . $row->prinom . " " . $row->segnom . "</td>" .
                                                            "<td>" . $row->priapell . " " . $row->segapell . "</td>" .
                                                            "<td>" . $row->grado . "</td>" .
                                                            "<td>" . "$no" . "</td>" .
                                                            "<td>" . "No Asistio" . "</td>" .
                                                            "</tr>";
                                                    }
                                                }
                                            }
                                            require_once 'excusas.php';


                                            for ($a = 0; $a < $ta; $a++) {

                                                if ($id == $asistio[$a]['id_identidad'] && $no == $asistio[$a]['fecha'] && $asistio[$a]['accion'] == 'in') {
                                                    $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                                                        "<script>swal.fire({
                                                icon :'info',
                                                title:'¡Informacion!',
                                                text:'Estudiante Asistio A La Institucion!',
                                                
                                                })</script>";
                                                    $a = $ta;
                                                } else {

                                                    for ($i = 0; $i < $tam; $i++) {
                                                        if ($id == $consulta[$i]['id_identidad'] &&    $no == $consulta[$i]['fecha']) {
                                                            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                                                                "<script>swal.fire({
                                                                icon :'info',
                                                                title:'¡Informacion!',
                                                                text:'Tiene Una Excusa registrada!!',
                                                            
                                                            })</script>";
                                                            $i = $tam;
                                                        } else {
                                                            $mensaje = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>" .
                                                                "<script>swal.fire({
                                                            icon :'info',
                                                            title:'¡Informacion!',
                                                            text:'No Cuenta Con Una Excusa ActualMente!!',
                                                            
                                                            })</script>";
                                                        }
                                                    }
                                                }
                                            }
                                            echo "<div>
                                        <strong></strong> " . $mensaje . "</div>";
                                        }
                                        if ($_POST['boton'] == 'agregar') {
                                            require_once 'conexion.php';
                                            $dao = new UsuarioDao();
                                            $id = htmlspecialchars($_POST['identidad_id']);
                                            $no = htmlspecialchars($_POST['fecha']);
                                            $excusa = "ok";
                                            $mensaje = $dao->insertarExcusa($id, $no, $excusa);
                                            echo "<div>
                                         <strong></strong> " . $mensaje . "</div>";
                                            //////////////////////////////////////////
                                            require_once 'conexion.php';
                                            $co = Conectar();
                                            $sql = "SELECT identidadid, prinom, segnom, priapell, segapell, grado
                                        FROM personal_institucion
                                        WHERE identidadid=:id";
                                            $stmt = $co->prepare($sql);
                                            $result = $stmt->execute(array(':id' => $id));
                                            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
                                            if (count($rows)) {
                                                foreach ($rows as $row) {
                                                    echo "<tr>" .
                                                        "<td>" . $row->identidadid . "</td>" .
                                                        "<td>" . $row->prinom . " " . $row->segnom . "</td>" .
                                                        "<td>" . $row->priapell . " " . $row->segapell .
                                                        "</td>" .
                                                        "<td>" . $row->grado . "</td>" .
                                                        "<td>" . "$no" . "</td>" .
                                                        "<td>" . "No Asistio" . "</td>" .
                                                        "</tr>";
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </form>
        </body>

        </html>
<?php
    } else {
        header("location: ../../login1.php");
    }
} else {
    header("location: ../../login1.php");
}
?>