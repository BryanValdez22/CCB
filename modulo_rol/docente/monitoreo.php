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
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="css/monitoreo.css">
            <title>Monitoreo</title>
        </head>

        <body>
            <header>
                <h2 class="titulo">institucion educativa bertha suttner</h2>
                <a id="cerrar-sesion" href="cerrarsesion.php">Cerrar Sesion</a>
            </header>
            <img class="img" src="img/empresa.png" alt="empresa">
            <h2 class="titulo-h2">Monitoreo</h2>
            <hr>
            <?php
            if (empty($mensaje) == false) {
                echo $mensaje;
            }
            ?>
            <div class="contenedor">
                <div class="bloque-primero">
                    <div class="botones">
                        <a href="reginasistencia.php" class="btn solid">Enviar Notificaciones</a>
                        <a href="registrovisita.php"><button class="btn solid" type="submit">Registrar Visitantes</button></a>
                    </div>

                    <!-- textarea -->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <div class="des">
                            <label class="descripcion">Descripcion del Accesorio</label>
                            <textarea name="accesorios" class="text" rows="25" role="50" placeholder="Descripcion del accesorio"></textarea>
                            <button type="submit" name="boton" value="accesorio">enviar</button>
                        </div>
                        <!-- textarea  -->
                        <!-- ejemplo de lector de codigo Qr -->
                        <div class="bloque-1">
                            <input type="number" name="ididentidad" class="excluir-" placeholder="ingrese id">
                            <button type="submit" class="btn-2" value="ingresar" name="boton">ingresar</button>
                        </div>

                        <!-- fin ejemplo de lector de codigo Qr -->


                </div>

                <div class="bloque-segundo">
                    <div class="tabla">
                        <input class="buscar" type="search" name="identidadid" placeholder="Buscar">
                        <button type="submit" name="boton" value="buscar">Buscar</button>
                        <a class="atras" href="manejogestiones.php">Atras</a>
                        <div class="mostrar-usuarios">
                            <?php
                            require_once 'tabla.php';
                            if ($tam == 0) {
                                echo "<p>No se encontro usuario<p/>";
                            } else {
                            ?>
                                <table style="width: 100%;">
                                    <tr>
                                        <thead>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Fecha</th>
                                            <th>cargo</th>
                                            <th>Accesorios</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (isset($_POST['boton'])) {
                                            if ($_POST['boton'] == 'buscar') {
                                                require_once 'conexion.php';
                                                $co = Conectar();
                                                $id = htmlspecialchars($_POST['identidadid']);

                                                $sql = "SELECT personal_institucion.identidadid,concat(personal_institucion.prinom,' ',personal_institucion.segnom) as nombres,concat(personal_institucion.priapell,' ',personal_institucion.segapell) as apellido, historial_ingreso.fecha,cargo.nombrecargo,historial_ingreso.accesorios FROM personal_institucion,cargo,historial_ingreso 
                    WHERE personal_institucion.identidadid=historial_ingreso.ididentidad AND 
                    cargo.cargoid=personal_institucion.cargoid AND
                    historial_ingreso.ididentidad=:id AND historial_ingreso.fecha=curdate();
                    ";
                                                $stmt = $co->prepare($sql);
                                                $result = $stmt->execute(array(':id' => $id));
                                                $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
                                                if (count($rows)) {
                                                    foreach ($rows as $row) {
                                                        echo "<tr>" .

                                                            "<td>" . $row->identidadid . "</td>" .
                                                            "<td>" . $row->nombres . "</td>" .
                                                            "<td>" . $row->apellido . "</td>" .
                                                            "<td>" . $row->fecha . "</td>" .
                                                            "<td>" . $row->nombrecargo . "</td>" .
                                                            "<td>" . $row->accesorios . "</td>" .
                                                            "</tr>";
                                                    }
                                                } else {
                                                    $mensaje = "Estudiante No Asistio";
                                                }
                                            } else if ($_POST['boton'] == 'accesorio') {
                                                require_once 'conexion.php';

                                                $co = Conectar();
                                                $id = htmlspecialchars($_POST['identidadid']);
                                                $sql = "SELECT personal_institucion.identidadid,concat(personal_institucion.prinom,' ',personal_institucion.segnom) as nombres,concat(personal_institucion.priapell,' ',personal_institucion.segapell) as apellido, historial_ingreso.fecha,cargo.nombrecargo,historial_ingreso.accesorios FROM personal_institucion,cargo,historial_ingreso 
                    WHERE personal_institucion.identidadid=historial_ingreso.ididentidad AND 
                    cargo.cargoid=personal_institucion.cargoid AND
                    historial_ingreso.ididentidad=:id AND historial_ingreso.fecha=curdate();
                    ";
                                                $stmt = $co->prepare($sql);
                                                $result = $stmt->execute(array(':id' => $id));
                                                $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
                                                if (count($rows)) {
                                                    foreach ($rows as $row) {
                                                        echo "<tr>" .
                                                            "<td>" . $row->identidadid . "</td>" .
                                                            "<td>" . $row->nombres . "</td>" .
                                                            "<td>" . $row->apellido . "</td>" .
                                                            "<td>" . $row->fecha . "</td>" .
                                                            "<td>" . $row->nombrecargo . "</td>" .
                                                            "<td>" . $row->accesorios . "</td>" .
                                                            "</tr>";
                                                    }
                                                }
                                                $dao = new UsuarioDao();
                                                $mensaje = "";
                                                if (isset($_POST['identidadid']) & isset($_POST['accesorios'])) {
                                                    $identidadid = htmlspecialchars($_POST['identidadid']);
                                                    $accesorios = htmlspecialchars($_POST['accesorios']);
                                                    if (empty($identidadid) | empty($accesorios)) {
                                                        $mensaje = "Campo Vacio";
                                                    } else {

                                                        $mensaje = $dao->agreacc($identidadid, $accesorios);
                                                    }
                                                };
                                            }
                                        }
                                    }

                                        ?>

                                        </tbody>
                                </table>
                        </div>
                    </div>
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