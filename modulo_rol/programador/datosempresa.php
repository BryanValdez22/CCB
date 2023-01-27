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
            <script src="https://kit.fontawesome.com/737883520a.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/datosempresa.css">
            <title>Datos de Empresa</title>
        </head>

        <body>
            <header>
                <h2 class="titulo">Institucion educativa bertha suttner</h2>
            </header>
            <img class="logo" src="img/empresa.png" alt="logo-empresa">
            <a id="cerrar-sesion" href="cerrarsesion.php"><i class="fas fa-sign-out-alt fa-lg"></i> Cerrar Sesión</a>
            <h2 class="h2-titulo">Datos de la empresa</h2>
            <hr>
            <?php
            if (empty($mensaje) == false) {
                echo $mensaje;
            }
            ?>
            <form action="guardarempresa.php" method="POST">
                <div class="form-div">
                    <div class="form">
                        <div class="bloque">
                            <label class="h3-titulo"><i class="fas fa-user-tie"></i> Nombre</label>
                            <input placeholder="nombre" type="text" name="nombre" value="<?php if (isset($nombre)) {
                                                                                                echo $nombre;
                                                                                            } ?>">
                        </div>
                        <div class="bloque">
                            <label class="h3-titulo"><i class="fas fa-globe"></i> Nit</label>
                            <input placeholder="nit" type="number" name="nit" value="<?php if (isset($nit)) {
                                                                                            echo $nit;
                                                                                        } ?>">
                        </div>
                        <div class="bloque">
                            <label class="h3-titulo"><i class="fas fa-city"></i> Ciudad</label>
                            <input placeholder="ciudad" type="text" name="ciudad" value="<?php if (isset($ciudad)) {
                                                                                                echo $ciudad;
                                                                                            } ?>">
                        </div>
                        <div class="bloque">
                            <label class="h3-titulo"><i class="fas fa-building"></i> Departamento</label>
                            <input placeholder="departamento" type="text" name="departamento" value="<?php if (isset($departamento)) {
                                                                                                            echo $departamento;
                                                                                                        } ?>">
                        </div>
                        <!-- <div class="bloque">
                               <h3 class="h3-titulo">Encabezado</h3>
                                <input type="file" name="encabezado" value=""> 
                                </div>
                                -->

                        <div class="bloque">
                            <label class="h3-titulo"><i class="far fa-map"></i> Codigo Postal</label>
                            <input placeholder="codigo postal" type="text" name="codigopostal" value="<?php if (isset($codigopostal)) {
                                                                                                            echo $codigopostal;
                                                                                                        } ?>">
                        </div>
                        <div class="bloque">
                            <label class="h3-titulo"><i class="fas fa-route"></i> Direccion</label>
                            <input placeholder="direccion" type="text" name="direccion" value="<?php if (isset($direccion)) {
                                                                                                    echo $direccion;
                                                                                                } ?>">
                        </div>
                        <div class="bloque">
                            <label class="h3-titulo"><i class="fas fa-envelope"></i> E-Mail</label>
                            <input placeholder="email" type="email" name="email" value="<?php if (isset($email)) {
                                                                                            echo $email;
                                                                                        } ?>">
                        </div>
                        <div class="bloque">
                            <label class="h3-titulo"><i class="fas fa-phone"></i> Telefono</label>
                            <input placeholder="telefono" type="number" name="telefono" value="<?php if (isset($telefono)) {
                                                                                                    echo $telefono;
                                                                                                } ?>">
                        </div>
                        <!--<div class="bloque"> 
                       <h3 class="h3-titulo">Logotipo</h3>
                        <input type="file" name="logotipo" value="">
                        </div> -->
                        <div class="botones">
                            <button class="boton" type="submit" value="guardar" name="boton"><i class="far fa-check-circle fa-lg"></i> Guardar</button>
                            <button class="boton" type="submit" value="borrar" name="boton"><i class="fas fa-trash fa-lg"></i> Borrar</button>
                            <a class="boton" href="configuracion.php"><i class="far fa-arrow-alt-circle-left fa-lg"></i> Atras</a>
                            <a href="vistaempresa.php" class="boton"><i class="fas fa-industry"></i> Datos empresas</a>
                        </div>
                    </div>
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