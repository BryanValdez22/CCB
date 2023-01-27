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
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="css/impresoras.css">
            <title>Impresora</title>
        </head>

        <body>
            <header>
                <h2 class="titulo">institucion educativa bertha suttner</h2>
            </header>
            <img src="img/empresa.png" alt="empresa" class="empresa">
            <a class="atras" href="configuracion.php">Atras</a>
            <h2 class="h2-titulo">Impresoras</h2>
            <hr>
            <div class="contenedor">
                <div class="servicio">
                    <button type="submit" class="boton-servicio">Agregar servicio</button>
                    <h2 class="texto">No hay Servicios Disponibles</h2>
                </div>
                <div class="boton">
                    <button type="submit" class="btn solid">Eliminar Servicio</button>
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