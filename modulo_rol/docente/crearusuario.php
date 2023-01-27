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
            <link rel="stylesheet" href="css/usuario-password.css">
            <title>Nuevo Usuario</title>
        </head>

        <body>
            <header>
                <h2 class="title">Institución Educativa Bertha Suttner</h2>
                <a class="retornar" href="usuariodata.php"><i class="far fa-arrow-alt-circle-left fa-lg"></i> Atras</a>
            </header>
            <img src="img/empresa.png" alt="empresa" class="empresa">
            <h2 class="titulo">Crear Usuario</h2>
            <hr>
            <?php
            if (empty($mensaje) == false) {
                echo $mensaje;
            }
            ?>
            <form action="mandarusuario.php" method="POST">
                <div class="form">
                    <div class="bloque">
                        <img class="img" src="logos/cusuario.svg" alt="logo">
                        <div class="contenedor">
                            <label><i class="fas fa-user-circle"></i> Usuario</label>
                            <input type="text" name="identidad_id" placeholder="Usuario" value="<?php if (isset($identidad_id)) {
                                                                                                    echo $identidad_id;
                                                                                                }  ?>">
                        </div>
                        <div class="contenedor">
                            <label><i class="fas fa-key"></i> Contraseña</label>
                            <input type="password" name="pass" placeholder="Contraseña" value="<?php if (isset($pass)) {
                                                                                                    echo $pass;
                                                                                                } ?>">
                        </div>
                        <div class="contenedor">
                            <label><i class="fas fa-people-arrows"></i> Nivel</label>
                            <select name="id_nivel">
                                <option>Seleccione Cargo</option>
                                <?php
                                require_once 'select.php';
                                $query = mysqli_query($mysqli, "SELECT id_nivel,nom_nivel FROM nivel");

                                while ($nivel = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $nivel['id_nivel'] ?>"><?php echo $nivel['nom_nivel'] ?> </option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="button">
                            <button class="btn solid" name="boton" value="guardar" type="submit"><i class="far fa-check-circle fa-lg"></i> Guardar</button>
                            <button class="btn solid" name="boton" value="limpiar" type="submit"><i class="fas fa-trash fa-lg"></i> Limpiar</button>
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