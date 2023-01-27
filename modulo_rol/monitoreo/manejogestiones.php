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
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/737883520a.js" crossorigin="anonymous"></script>
      <link rel="icon" type="image/x-icon" href="img/institucion.ico">
      <link rel="stylesheet" href="css/manejogestiones.css">

      <title>Manejo de Gestiones</title>

      <style>
        #info {
          float: right;
          width: 50px;
          padding: 10px;
        }
      </style>

    </head>

    <body>
      <header>
        <h2 class="titulo">institucion Educativa bertha suttner</h2>
        <a id="cerrar-sesion" href="cerrarsesion.php"><i class="fas fa-sign-out-alt fa-lg"></i> Cerrar Sesion</a>
      </header>
      <img class="empresa" src="img/empresa.png" alt="empresa">
      <h2 class="h2-titulo">Manejo de Gestiones</h2>
      <hr>
      <a href="acerca.php">
        <div id="info"><img src="logos/acercade.svg" alt="acercade"></div>
      </a>
      <div class="bloque fadeInDown">
        <div class="bloque-2">
          <a href="monitoreo.php">
            <div class="gestion">
              <h2 class="h2-bloque">Monitoreo del Personal</h2>
              <img src="logos/monitoreo.svg" alt="logo">
            </div>
          </a>
        </div>
      </div>

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