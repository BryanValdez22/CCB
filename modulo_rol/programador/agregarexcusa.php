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
            <link rel="stylesheet" href="css/agregarexcusa.css">
            <title>Agregar Excusa</title>
        </head>

        <body>
            <header>
                <h2 class="titulo">institucion educativa bertha suttner</h2>
            </header>
            <img class="empresa" src="img/empresa.png" alt="logo">
            <a class="atras" href="asistencias.php">Atras</a>
            <h2 class="h2-titulo">Agregar excusas</h2>
            <hr>
            <div class="bloque">
                <div class="bloque-dentro">
                    <label class="label" for="">Agregar Excusa</label>
                    <textarea class="text" cols="30" rows="10" placeholder="Agregue su Excusa"></textarea>
                    <button class="btn solid" type="submit">Guardar</button>
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