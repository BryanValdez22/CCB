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
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="css/acerca.css">
            <title>Acerca De</title>
        </head>

        <body>
            <div class="contenedor fadeInDown">
                <div class="container">
                    <div class="cont">
                        <h1 class="acercade">Acerca de</h1>
                        <hr id="hr">
                        <a href="#" class="actualizar">Actualizacion</a>
                        <h2 class="titulo">Sitio Oficial</h2>
                        <a class="link" href="https://www.Infotechnologyassociationsla.blogspot.com">
                            https://www.Infotechnologyassociationsla.blogspot.com</a>
                        <h2 class="h2-titulo">Version <span>1.0.2</span> </h2>
                        <img class="empresa" src="img/empresa.png" alt="empresa">
                        <hr>
                        <footer>
                            <p>&copy:2020 Derechos Reservados Infotechnology Associations</p>
                        </footer>
                    </div>
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