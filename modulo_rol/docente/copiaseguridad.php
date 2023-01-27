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
            <script src="https://kit.fontawesome.com/737883520a.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/copiaseguridad.css">
            <title>Copia de Seguridad</title>
        </head>

        <body>
            <header>
                <h2 class="titulo">institucion educativa bertha suttner</h2>
            </header>
            <img src="img/empresa.png" alt="Logo" class="empresa">
            <a href="#" id="cerrar-sesion"><i class="fas fa-sign-out-alt fa-lg"></i> Cerrar Sesion</a>
            <h2 class="h2-titulo">Copias de Seguridad</h2>
            <hr>
            <div class="contenedor">
                <div class="bloque">
                    <div class="label-input">
                        <label class="label">Crear Copia de Seguridad</label>
                        <input type="file" id="file1">
                        <label for="file1" class="lab"><i class="far fa-file-alt"></i> Examinar</label>
                    </div>
                    <div class="label-input">
                        <label class="label">Restaurar Copia de Seguridad</label>
                        <input type="file" id="file">
                        <label for="file" class="lab"><i class="far fa-file-alt"></i> Examinar</label>
                    </div>
                </div>
                <a class="atras" href="configuracion.php"><i class="far fa-arrow-alt-circle-left fa-lg"></i> Atras</a>
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