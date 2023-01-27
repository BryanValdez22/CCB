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
            <link rel="icon" type="image/x-icon" href="img/institucion.ico">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="css/config.css">

            <!-- Material Bootstrap -->
            <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
            <!-- Material Design Bootstrap -->
            <!-- <link rel="stylesheet" href="css/mdb.min.css" /> -->
            <!-- Your custom styles (optional) -->
            <!-- <link rel="stylesheet" href="css/style.css" /> -->
            <!-- fin material Bootstrap -->

            <title>Configuracion</title>

            <style>
            </style>
        </head>

        <body>

            <header>
                <h2 class="titulo">institucion educativa bertha suttner</h2>
            </header>
            <img class="empresa" src="img/empresa.png" alt="empresa.png">
            <a id="cerrar-sesion" href="#">Cerrar session</a>
            <h2 class="h2-titulo">Configuracion</h2>
            <hr>
            <div class="contenedor">
                <div class="bloque">
                    <form action="mandar_config.php" method="post">
                        <div class="cont">
                            <label>Nit</label>
                            <input type="number" name="nit" placeholder="Nit">
                        </div>

                        <div class="cont">
                            <label>institucion</label>
                            <input type="text" name="institucion" placeholder="institucion">
                        </div>
                        <div class="cont">
                            <label>Ciudad</label>
                            <select name="ciudad">
                                <option value="">Seleccione una ciudad</option>
                                <option value="1">Cartagena</option>
                                <option value="2">Barranquilla</option>
                                <option value="3">Santa marta</option>
                                <option value="4">Monteria</option>
                            </select>
                        </div>

                        <div class="cont">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="email">
                        </div>

                        <div class="cont">
                            <label>Telefono</label>
                            <input type="number" name="telefono" placeholder="telefono">
                        </div>

                        <div class="cont">
                            <label>Direccion</label>
                            <input type="text" name="direccion" placeholder="direccion">
                        </div>
                        <button type="submit" class="btn btn-solid" id="guardar" value="guardar" name="guardar">Guardar</button>
                        <button type="submit" class="btn btn-solid" id="atras" value="borrar" name="borrar">Borrar</button>
                        <a class="btn" id="atras" href="manejogestiones.php">Atras</a>
                    </form>
                </div>
            </div>

            <!-- BOOTSTRAP -->
            <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
            <!-- Bootstrap tooltips -->
            <!-- <script type="text/javascript" src="js/popper.min.js"></script> -->
            <!-- Bootstrap core JavaScript -->
            <!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
            <!-- MDB core JavaScript -->
            <!-- <script type="text/javascript" src="js/mdb.min.js"></script> -->
            <!-- Your custom scripts (optional) -->
            <!-- <script type="text/javascript"></script> -->
            <!-- fin Bootstrap -->

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