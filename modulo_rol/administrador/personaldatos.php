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
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="css/personaldatos.css">
            <title>Gestion del Personal</title>
        </head>

        <body>
            <header>
                <h2 class="titulo">institucion educativa bertha suttner</h2>
            </header>
            <img class="empresa" src="img/empresa.png" alt="empresa">
            <h2 class="h2-titulo">Agregar Personal</h2>
            <hr>
            <?php
            if (empty($mensaje) == false) {
                echo $mensaje;
            }
            ?>
            <form action="guardarpersonal.php" method="POST">
                <div class="bloque">
                    <div class="blockk">
                        <div class="block">
                            <label class="label">Numero ID</label>
                            <input type="number" name="identidadid" placeholder="Ingrese id" value="<?php if (isset($identidadid)) {
                                                                                                        echo $identidadid;
                                                                                                    } ?>">
                        </div>
                        <div class="block">
                            <label class="label">Primer Nombre</label>
                            <input type="text" name="prinom" placeholder="Ingrese Nombre" value="<?php if (isset($prinom)) {
                                                                                                        echo $prinom;
                                                                                                    } ?>">
                        </div>
                        <div class="block">
                            <label class="label">Segundo Nombre</label>
                            <input type="text" name="segnom" placeholder="Segundo Nombre" value="<?php if (isset($segnom)) {
                                                                                                        echo $segnom;
                                                                                                    } ?>">
                        </div>
                        <div class="block">
                            <label class="label">Primer Apellido</label>
                            <input type="text" name="priapell" placeholder="Ingrese Apellido" value="<?php if (isset($priapell)) {
                                                                                                            echo $priapell;
                                                                                                        } ?>">
                        </div>
                        <div class="block">
                            <label class="label">Segundo Apellido</label>
                            <input type="text" name="segapell" placeholder="Segundo Apellido" value="<?php if (isset($segapell)) {
                                                                                                            echo $segapell;
                                                                                                        } ?>">
                        </div>
                        <div class="block">
                            <label class="label">Fecha de Nacimiento</label>
                            <input type="date" name="fechanacimiento" placeholder="Fecha de Nacimiento" value="<?php if (isset($fechanacimiento)) {
                                                                                                                    echo $fechanacimiento;
                                                                                                                } ?>">
                        </div>

                        <div class="block">
                            <label class="label">Grado</label>
                            <input type="number" name="grado" placeholder="Grado" value="<?php if (isset($grado)) {
                                                                                                echo $grado;
                                                                                            } ?>">
                        </div>
                        <div class="block">
                            <label class="label">Cargo</label>
                            <select name="cargoid">
                                <option class="option" value="">Seleccione su Cargo</option>
                                <?php
                                require_once 'select.php';
                                $query = mysqli_query($mysqli, "SELECT *  FROM cargo");

                                while ($nivel = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $nivel['cargoid'] ?>"><?php echo $nivel['nombrecargo'] ?> </option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="block">
                            <label class="label">Ciudad</label>
                            <select name="idciudad">
                                <option class="option" value="">Seleccione su ciudad</option>
                                <option class="option" value="100">Cartagena</option>
                                <option class="option" value="101">Barranquilla</option>
                                <option class="option" value="103">Santa Marta</option>
                                <option class="option" value="104">Monteria</option>
                            </select>
                        </div>
                        <div class="block">
                            <label class="label">Barrio</label>
                            <input type="text" name="barrio" placeholder="Ingrese Barrio" value="<?php if (isset($barrio)) {
                                                                                                        echo $barrio;
                                                                                                    } ?>">
                        </div>
                        <div class="block">
                            <label class="label">Direccion</label>
                            <input type="text" name="direccion" placeholder="Ingrese Direccion" value="<?php if (isset($direccion)) {
                                                                                                            echo $direccion;
                                                                                                        } ?>">
                        </div>
                        <div class="block">
                            <label class="label">E-mail</label>
                            <input type="email" name="email" placeholder="Ingrese Email" value="<?php if (isset($email)) {
                                                                                                    echo $email;
                                                                                                } ?>">
                        </div>
                        <div class="block">
                            <label class="label">Telefono</label>
                            <input type="number" name="telefono" placeholder="Ingrese Telefono" value="<?php if (isset($telefono)) {
                                                                                                            echo $telefono;
                                                                                                        } ?>">
                        </div>
                        <div class="boton">
                            <button name="boton" value="guardar" type="submit" class="btn solid">Registrar</button>
                            <button name="boton" value="limpiar" type="submit" class="btn solid">Limpiar</button>
                            <a href="gestionpersonal.php" class="atras">Atras</a>
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