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
            <link rel="stylesheet" href="css/gestioninforme.css">
            <title>Gestion de Informes</title>
        </head>

        <body>
            <header>
                <h2 class="titulo">institucion educativa bertha suttner</h2>
            </header>
            <img src="img/empresa.png" alt="empresa" class="empresa">
            <a id="cerrar-sesion" href="cerrarsesion.php"><i class="fas fa-sign-out-alt fa-lg"></i>Cerrar Sesion</a>
            <h2 class="h2-titulo">Gestion de Informes</h2>
            <hr>
            <div class="contenedor">
                <div class="botones">
                    <div class="boton">
                        <a href="reporte/excusas/index.php">informe general excusa</a>
                    </div>
                    <div class="boton">
                        <a href="reporte/inasistencia/index.php">informe general de inasistencia</a>
                    </div>
                </div>
                <a class="btn btn-atras" href="manejogestiones.php">Atras</a>
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