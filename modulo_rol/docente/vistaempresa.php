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
            <script src="https://kit.fontawesome.com/737883520a.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/vistaempresa.css">
            <title>vista empresa</title>

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
            </header>

            <!-- -----------------------tabla visitantes---------------- -->

            <img class="empresa" src="img/empresa.png" alt="empresa.png">
            <a id="cerrar-sesion" href="configuracion.php"><i class="far fa-arrow-alt-circle-left fa-lg"></i> Atras</a>
            <h2 class="h2-titulo">Empresa</h2>
            <hr>
            <br>
            <div class="container-fluid">
                <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th><i class="fas fa-industry"></i> Nombre</th>
                            <th><i class="fas fa-info"></i> Nit</th>
                            <th><i class="fas fa-city"></i> Ciudad</th>
                            <th><i class="fas fa-route"></i> Departamento</th>
                            <th><i class="fas fa-at"></i> Codigo postal</th>
                            <th><i class="fas fa-route"></i> Direccion</th>
                            <th><i class="fas fa-envelope"></i> Email</th>
                            <th><i class="fas fa-phone"></i> Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'tabla.php';
                        foreach ($empresa as $datos) {
                            echo "<tr>" .
                                "<td>" . $datos["nombre"] . "</td>" .
                                "<td>" . $datos["nit"] . "</td>" .
                                "<td>" . $datos["ciudad"] . "</td>" .
                                "<td>" . $datos["departamento"] . "</td>" .
                                "<td>" . $datos["codigopostal"] . "</td>" .
                                "<td>" . $datos["direccion"] . "</td>" .
                                "<td>" . $datos["email"] . "</td>" .
                                "<td>" . $datos["telefono"] . "</td>" .
                                "</tr>";
                        }

                        ?>
                    </tbody>
                </table>

                <!-- -----------------------tabla visitantes---------------- -->

            </div>

            <!-- Bootstrap -->
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
            <script>
                // function asegurar() {
                //     rc = confirm("¿Seguro que desea Eliminar?");
                //     return rc;
                // }
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