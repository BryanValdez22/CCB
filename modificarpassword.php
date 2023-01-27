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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/usuario-password.css">
            <title>Modificar password</title>
        </head>

        <body>
            <header>
                <h2 class="title">Institución Educativa Bertha Suttner</h2>
                <a class="retornar" href="usuariodata.php">Atras</a>
            </header>
            <img src="img/empresa.png" alt="empresa" class="empresa">
            <h2 class="titulo">Modificar Contraseñas</h2>
            <hr>
            <?php
            if (empty($mensaje) == false) {
                echo $mensaje;
            }
            ?>
            <form action="actualizar.php" method="post">
                <div class="form">
                    <div class="bloque">
                        <img class="img" src="logos/contraseña.svg" alt="Contraseña">
                        <!-- <div class="contenedor">
                        <label>Usuario</label>
                        <input type="text" name="identidad_id" placeholder="usuario" value="<?php if (isset($identidad_id)) {
                                                                                                echo $identidad_id;
                                                                                            } ?>">
                    </div> -->
                        <div class="contenedor">
                            <label>Contraseña</label>
                            <input type="password" name="password1" placeholder="password" value="<?php if (isset($password1)) {
                                                                                                        echo $password1;
                                                                                                    } ?>">
                        </div>
                        <div class="contenedor">
                            <label>Confirmar contraseña</label>
                            <input type="password" name="password2" placeholder="confirmar contraseña" value="<?php if (isset($password2)) {
                                                                                                                    echo $password2;
                                                                                                                } ?>">
                        </div>
                        <button class="btn solid" type="submit" name="boton" value="guardar" onclick="javascript:return asegurar();">Guardar</button>
                        <button type="submit" name="boton" value="limpiar" class="btn solid">Limpiar</button>
                    </div>
                </div>
            </form>
            <script>
                function asegurar() {
                    rc = confirm("¿Seguro que desea Actualizar?");
                    return rc;
                }
            </script>
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