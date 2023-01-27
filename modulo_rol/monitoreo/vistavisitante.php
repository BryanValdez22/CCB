<?php
session_start();
$version = $_SESSION['usuario'];
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["rol"] == 5) {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/737883520a.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/visitante.css">

            <!-- Bootstrap -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="/mdb.min.css">
            <link rel="stylesheet" href="/bootstrap.min.css">
            <link rel="stylesheet" href="/style.css">
            <!-- Bootstrap -->

            <title>Visitantes Registrados</title>
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
            </header>
            <img class="empresa" src="img/empresa.png" alt="empresa.png">
            <a id="cerrar-sesion" href="cerrarsesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</a>
            <h2 class="h2-titulo">Visitantes</h2>
            <hr>
            <div class="container-fluid">
                <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th><i class="fas fa-user"></i> ID</th>
                            <th><i class="fas fa-user-tie"></i> Nombres</th>
                            <th><i class="fas fa-user-tie"></i> Apellidos</th>
                            <th><i class="fas fa-calendar-alt"></i> F. nacimiento</th>
                            <th><i class="fas fa-city"></i> Ciudad</th>
                            <th><i class="fas fa-route"></i> Direccion</th>
                            <th><i class="fas fa-envelope"></i> Email</th>
                            <th><i class="fas fa-phone"></i> Telefono</th>
                            <th><i class="fas fa-minus-circle"></i> Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'tabla.php';
                        foreach ($visitante as $visita) {
                            echo "<tr>" .
                                "<td>" . $visita["identidadid"] . "</td>" .
                                "<td>" . $visita["prinom"] . " " . $visita["segnom"] . "</td>" .
                                "<td>" . $visita["priapell"] . " " . $visita["segapell"] . "</td>" .
                                "<td>" . $visita["fechanacimiento"] . "</td>" .
                                "<td>" . $visita["idciudad"] . "</td>" .
                                "<td>" . $visita["barrio"] . $visita["direccion"] . "</td>" .
                                "<td>" . $visita["email"] . "</td>" .
                                "<td>" . $visita["telefono"] . "</td>" .
                                "<td>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;<a href='eliminarvis.php?identidadid=" . base64_encode($visita["identidadid"]) .
                                "'onclick='javascript:return asegurar();'>Eliminar</a></td>" .
                                "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
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