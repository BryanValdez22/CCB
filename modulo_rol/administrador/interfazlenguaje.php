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
            <link rel="stylesheet" href="css/interfazlenguaje.css">
            <title>Interfaz y lenguaje</title>
        </head>

        <body>

            <header>
                <h2 class="h2-titulo">Institucion educativa bertha suttner</h2>
            </header>
            <img class="empresa" src="img/empresa" alt="empresa" class="logo-empresa">
            <a id="cerrar-sesion" href="cerrarsesion.php">Cerrar Sesión</a>
            <h2 class="titulo-c">Interfaz y Lenguaje</h2>
            <hr>
            <form action="" method="post">
                <div class="form">
                    <div class="primer-bloque">
                        <div class="estilos-bloque">
                            <label for="">Color de Encabezado</label>
                            <select name="encabezado" class="option">
                                <option>Seleccione el Color</option>
                                <option value="1">Azul</option>
                                <option value="2">Verde</option>
                                <option value="3">Negro</option>
                                <option value="4">Predeterminado</option>
                            </select>
                        </div>
                        <div class="estilos-bloque">
                            <h3>Color de Fuente</h3>
                            <select name="fuente" class="option">
                                <option>Seleccione el Color</option>
                                <option value="1">Azul</option>
                                <option value="2">Rojo</option>
                                <option value="3">Verde</option>
                                <option value="4">Predeterminado</option>
                            </select>
                        </div>
                    </div>
                    <div class="primer-bloque">
                        <div class="estilos-bloque">
                            <label for="" aria-required>Estilo de Fuente</label>
                            <select name="encabezado" class="option">
                                <option>Seleccione la Fuente</option>
                                <option value="2">Times new roman</option>
                                <option value="1">Arial</option>
                                <option value="3">Calibri</option>
                                <option value="4">Predeterminado</option>
                            </select>
                        </div>
                        <div class="estilos-bloque">
                            <label for="">Lenguaje</label>
                            <select name="fuente" class="option">
                                <option>Seleccione el Lenguaje</option>
                                <option value="1">Español</option>
                                <option value="2">Ingles</option>
                                <option value="3">Frances</option>
                                <option value="4">Predeterminado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="boton">
                    <button class="btn solid" type="submit">Guardar</button>
                    <button class="btn solid" type="reset">Cancelar</button>
                    <button class="btn solid"><a href="configuracion.php">Atras</a></button>
                </div>
            </form>
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