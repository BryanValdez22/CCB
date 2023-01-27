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
            <link rel="stylesheet" href="css/registrovisita.css">
            <title>Registro de Visitantes</title>
        </head>

        <body>
            <header>
                <h2 class="titulo">institucion educativa bertha suttner</h2>
            </header>
            <img src="img/empresa.png" alt="logo" class="empresa">
            <h2 class="h2-titulo">Registro</h2>
            <hr>
            <div class="contenedor">
                <div class="cont">
                    <div class="registro">
                        <h2 class="visitantes">Registro de Visitantes</h2>
                    </div>
                    <?php
                    if (empty($mensaje) == false) {
                        echo $mensaje;
                    }
                    ?>
                    <form action="guardarvisitante.php" method="post">
                        <div class="label-input">
                            <label class="label">Identificacion</label>
                            <input name="identidadid" type="number" class="input" placeholder="Identificacion" value="<?php if (isset($identidadid)) {
                                                                                                                            echo $identidadid;
                                                                                                                        } ?>">
                        </div>
                        <div class="label-input">
                            <label class="label">Primer Nombre</label>
                            <input name="prinom" type="text" class="input" placeholder="Nombre" value="<?php if (isset($prinom)) {
                                                                                                            echo $prinom;
                                                                                                        } ?>">
                        </div>
                        <div class="label-input">
                            <label class="label">Segundo Nombre</label>
                            <input name="segnom" type="text" class="input" placeholder="Segundo Nombre" value="<?php if (isset($segnom)) {
                                                                                                                    echo $segnom;
                                                                                                                } ?>">
                        </div>
                        <div class="label-input">
                            <label class="label">Primer Apellido</label>
                            <input name="priapell" type="text" class="input" placeholder="Apellido" value="<?php if (isset($priapell)) {
                                                                                                                echo $priapell;
                                                                                                            } ?>">
                        </div>
                        <div class="label-input">
                            <label class="label">Segundo Apellido</label>
                            <input name="segapell" type="text" class="input" placeholder="Segundo Apellido" value="<?php if (isset($segapell)) {
                                                                                                                        echo $segapell;
                                                                                                                    } ?>">
                        </div>
                        <div class="label-input">
                            <label class="label">Telefono</label>
                            <input name="telefono" type="number" class="input" placeholder="Telefono" value="<?php if (isset($telefono)) {
                                                                                                                    echo $telefono;
                                                                                                                } ?>">
                        </div>
                        <div class="boton">
                            <button type="submit" class="btn solid" name="boton" value="guardar">Guardar</button>
                            <button type="submit" class="btn solid" name="boton" value="limpiar">Limpiar</button>
                            <a href="monitoreo.php" class="atras">Atras</a>
                            <a href="vistavisitante.php" class="atras">Ver visitante</a>
                        </div>
                    </form>
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