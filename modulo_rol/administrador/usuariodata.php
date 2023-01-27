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
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet">
            <script src="https://kit.fontawesome.com/737883520a.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/usuariodata.css">
            <title>Configuracion de Usuario</title>
        </head>

        <body>
            <header>
                <h2 class="title">institucion educativa bertha suttner</h2>
                <a id="cerrar-sesion" href="cerrarsesion.php"><i class="fas fa-sign-out-alt fa-lg"></i> Cerrar Sesión</a>
            </header>
            <img class="empresa" src="img/empresa.png" alt="empresa">
            <h2 class="titulo">Configuracion de Usuarios</h2>
            <hr>
            <div class="container-derecho">
                <div class="container">
                    <a href="crearusuario.php">
                        <div class="usuario-password">
                            <img class="img" src="logos/cusuario.svg" alt="Usuario">
                            <h2 class="class-1">Crear Usuario</h2>
                        </div>
                    </a>
                    <a href="configuracion.php" class="btn"><i class="far fa-arrow-alt-circle-left fa-lg"></i> Atras</a>
                </div>
            </div>
            <div class="container-izquierdo">
                <h2 id="titulo-h2">Usuarios</h2>
                <?php
                require_once 'tabla.php';
                if ($tam == 0) {
                    echo "<p class='titulo-fondo'>No se Encontraron Usuarios</p>";
                } else {
                ?>
                    <!-- <div class="form-group">
                    <input type="text" class="buscar" style="width:20%" id="search" placeholder="Buscar Usuario">
                </div> -->
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th><i class="fas fa-sort-amount-down"></i> N°</th>
                                <th><i class="fas fa-user-circle"></i> Usuario</th>
                                <th><i class="fas fa-people-arrows"></i> Nivel</th>
                                <th><i class="fas fa-minus-circle"></i> Accion</th>
                            <tr>
                        </thead>
                        <tbody>
                            <?php
                            $cont = 1;
                            foreach ($usuarios as $usuario) {
                                echo "<tr>" .
                                    "<td>" . $cont . "</td>" .
                                    "<td>" . $usuario["identidad_id"] . "</td>" .
                                    "<td>" . $usuario["nom_nivel"] . "</td>" .
                                    "<td>" .
                                    // "<td><a href='actualizar.php?objeto'=" . base64_encode(serialize($usuario)) .
                                    // "' class='btn-actualizar'>Actualizar</a> &nbsp;&nbsp;&nbsp;&nbsp" .
                                    "<a href='eliminar.php?identidad_id=" . base64_encode($usuario["identidad_id"]) .
                                    "' class='btn-eliminar' onclick='javascript:return asegurar();'>Eliminar</a></td>" .
                                    "</tr>";
                                $cont++;
                            }
                            ?>
                        </tbody>
                        <?php

                        ?>
                    </table>
                <?php
                }
                ?>
            </div>
            <script>
                function asegurar() {
                    rc = confirm("¿Seguro que desea Eliminar?");
                    return rc;
                }
                // $(document).ready(function() {
                //     $('#example').DataTable();
                // })
            </script>
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