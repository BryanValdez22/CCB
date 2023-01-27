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
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

                    <div class="usuario-password" onclick="mostrar()">
                        <img class="img" src="logos/cusuario.svg" alt="Usuario">
                        <h2 class="class-1">Crear Usuario</h2>
                    </div>

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

                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th><i class="fas fa-sort-amount-down"></i> N°</th>
                                <th><i class="fas fa-user-circle"></i> Usuario</th>
                                <th><i class="fas fa-people-arrows"></i> Nivel</th>
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
            <script src=""></script>
            <script>
                function mostrar() {
                    swal.fire({
                        icon: 'warning',
                        title: 'Error',
                        text: 'Se require un nivel superior para acceder a esta funcion',
                    })
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