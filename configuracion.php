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
            <link rel="stylesheet" href="css/configuracionsis.css">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet">
            <script src="https://kit.fontawesome.com/737883520a.js" crossorigin="anonymous"></script>
            <title>Configuracion</title>
        </head>

        <body>
            <header>
                <h2 id="header">INSTITUCION EDUCATIVA BERTHA SUTTNER</h2>
                <a id="cerrar-sesion" href="cerrarsesion.php"><i class="fas fa-sign-out-alt fa-lg"></i>Cerrar Sesión</a>
            </header>
            <img class="empresa" src="img/empresa.png" alt="empresa">
            <h2 class="titulo-general">Configuración General</h2>
            <hr>
            <a href="manejogestiones.php">
                <div id="pagina"><img src="logos/izquierda.svg" alt="pag-2">
                </div>
            </a>
            <a href="acerca.php">
                <div id="info"><img src="logos/acercade.svg" alt="acercade"></div>
            </a>
            <div class="cont fadeInDown">
                <div id="contenedor1">
                    <a href="copiaseguridad.php">
                        <div class="contenedor">
                            <h2 class="h2-bloque">Copias de Seguridad</h2>
                            <img class="img" src="logos/backup.svg" alt="Copia de Seguridad">
                        </div>
                    </a>
                    <a href="datosempresa.php">
                        <div class="contenedor">
                            <h2 class="h2-bloque">Datos de la Empresa</h2>
                            <img class="img" src="logos/datos.svg" alt="datos de la empresa">
                        </div>
                    </a>
                </div>
                <div id="contenedor3">
                    <a href="usuariodata.php">
                        <div class="contenedor">
                            <h2 class="h2-bloque">Configuración de Usuarios</h2>
                            <img class="img" src="logos/configuracionuser.svg" alt="configuracion de usuarios">
                        </div>
                    </a>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="js/swetAlert.js"></script>
        </body>

        </html>
<?php
    } else {
        header("location: login1.php");
    }
} else {
    header("location: login1.php");
}
?>