<?php
session_start();
$version = $_SESSION['usuario'];
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["rol"] == 3) {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/737883520a.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/gestionpersonal.css">
            <title>Gestion del Personal</title>

            <!-- Bootstrap -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
            <!-- Bootstrap -->

            <style>
                thead {
                    background-color: #40C0EA !important;
                }

                tr,
                th {
                    border: 1px solid #00ACEC !important;
                }

                table,
                tr,
                th {
                    border: 1px solid #00C1FF !important;
                }
            </style>

        </head>

        <body>
            <header>
                <h2 class="titulo">institucion educativa bertha suttner</h2>
                <!-- <a id="cerrar-sesion" href="cerrarsesion.php">Cerrar Sesion</a> -->
            </header>

            <a class="btn btn-danger float-right shadow-lg mr-3 mt-4" href="cerrarsesion.php"><i class="fas fa-sign-out-alt fa-lg"></i> Cerrar Sesion</a>
            <img class="empresa" src="img/empresa.png" alt="empresa">
            <h2 class="h2-titulo">Gestion del Personal</h2>
            <hr>

            <?php
            if (empty($mensaje) == false) {
                echo $mensaje;
            }
            ?>
            <div class="container-fluid">
                <div class="bloque-izquierda">
                    <!-- <a class="ap" href="personaldatos.php"><i class="fas fa-plus"></i> Agregar Personal</a> -->
                    <a class="btn btn-primary shadow-lg" href="personaldatos.php"><i class="fas fa-plus"></i> Agregar Personal</a>
                    <a class="btn btn-danger shadow-lg" href="manejogestiones.php"><i class="far fa-arrow-alt-circle-left fa-lg"></i> atras</a>
                    <h2 class="h2-usuarios">Personal</h2>

                    <!-- --------------------------------------tabla personal------------------------------- -->

                    <?php
                    require_once 'tabla.php';
                    if ($tam == 0) {
                        echo "<p class='titulo-fondo'>No se Encontraron Usuarios</p>";
                    } else {
                    ?>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nombre</th>
                                    <th>apellidos</th>
                                    <th>F. Nacimiento</th>
                                    <th>Grado</th>
                                    <th>Cargo</th>
                                    <th>Ciudad</th>
                                    <th>Barrio</th>
                                    <th>Direccion</th>
                                    <th>E-mail</th>
                                    <th>Telefono</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($personal as $persona) {
                                    echo "<tr>" .
                                        "<td>" . $persona["identidadid"] . "</td>" .
                                        "<td>" . $persona["nombres"] . "</td>" .
                                        "<td>" . $persona["apellidos"] . "</td>" .
                                        "<td>" . $persona["fechanacimiento"] . "</td>" .
                                        "<td>" . $persona["grado"] . "</td>" .
                                        "<td>" . $persona["nombrecargo"] . "</td>" .
                                        "<td>" . $persona["idciudad"] . "</td>" .
                                        "<td>" . $persona["barrio"] . "</td>" .
                                        "<td>" . $persona["direccion"] . "</td>" .
                                        "<td>" . $persona["email"] . "</td>" .
                                        "<td>" . $persona["telefono"] . "</td>" .
                                        "<td>" . "<a href='actualizarpersonal.php?objeto=" . base64_encode(serialize($persona)) .
                                        "' class='btn-actualizar'>Actualizar</a> &nbsp;&nbsp;&nbsp;&nbsp" .
                                        "<a href='eliminarpersonal.php?identidadid=" . base64_encode($persona["identidadid"]) .
                                        "'class='btn-eliminar' onclick='javascript:return asegurar();'>Eliminar</a></td>" .
                                        "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>

                    <!-- --------------------------------------tabla personal------------------------------- -->


                    <!-- Bootstrap -->
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
                    <script>
                        function asegurar() {
                            rc = confirm("¿Seguro que desea Eliminar?");
                            return rc;
                        }
                        $(document).ready(function() {
                            $('#example').DataTable();
                        });
                    </script>
                    <!-- Bootstrap -->

                </div>
            </div>
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