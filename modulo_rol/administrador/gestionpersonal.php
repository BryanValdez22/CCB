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
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="css/gestionpersonal.css">
            <title>Gestion del Personal</title>
        </head>

        <body>
            <header>
                <h2 class="titulo">institucion educativa bertha suttner</h2>
                <a id="cerrar-sesion" href="cerrarsesion.php">Cerrar Sesion</a>
            </header>
            <img class="empresa" src="img/empresa.png" alt="empresa">
            <h2 class="h2-titulo">Gestion del Personal</h2>
            <hr>
            <?php
            if (empty($mensaje) == false) {
                echo $mensaje;
            }
            ?>
            <div class="bloque-izquierda">
                <input id="searchTerm" class="buscar" type="search" name="buscar" onkeyup="doSearch()" placeholder="Buscar Personal">
                <a class="ap" href="personaldatos.php">Agregar Personal</a>
                <a class="atras" href="manejogestiones.php">atras</a>
                <h2 class="h2-usuarios">Personal</h2>
                <div class="mostrar-usuarios">
                    <?php
                    require_once 'tabla.php';
                    if ($tam == 0) {
                        echo "<p class='titulo-fondo'>No se Encontraron Usuarios</p>";
                    } else {
                    ?>
                        <table id="regTable" style="width: 100%;">
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
                                        "<td>" . "<a href='actualizarpersonal.php?objeto'=" . base64_encode(serialize($persona)) .
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
                </div>
                <script>
                    function asegurar() {
                        rc = confirm("¿Seguro que desea Eliminar?");
                        return rc;
                    }

                    function doSearch() {
                        var tableReg = document.getElementById('regTable');
                        var searchText = document.getElementById('searchTerm').value.toLowerCase();
                        for (var i = 1; i < tableReg.rows.length; i++) {
                            var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                            var found = false;
                            for (var j = 0; j < cellsOfRow.length && !found; j++) {
                                var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                                if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                                    found = true;
                                }
                            }
                            if (found) {
                                tableReg.rows[i].style.display = '';
                            } else {
                                tableReg.rows[i].style.display = 'none';
                            }
                        }
                    }
                </script>
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