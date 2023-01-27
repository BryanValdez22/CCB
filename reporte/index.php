<?php
  session_start();
  $version = $_SESSION['usuario'];
  if (isset($_SESSION["usuario"])){
	  if ($_SESSION["rol"]==4){
 
    ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VICITANTES</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/reporte.css"> 
    <link rel="icon" href="../asset/img/favi.ico">
       <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
    <h3>REPORTES GENERALES</h3>
    </header>
    <div class="contenedor"> 
    	
   <a href="inasistencia/index.php"><button  type="submit" class="btn1">Reporte General De Inasistencias </button></a> 
<a href="excusas/index.php"><button  type="submit" class="btn2">Reporte General De Excusas</button></a>
     </div>     
 <footer>
<a href="../gestiones/manejoGestiones.php"><img class="atras" src="../asset/img/atras.png" alt=""></a>
<img src="../asset/img/eje.png" alt="foto" id="empresa">
<a  type="submit" href="../configuracion/acerca.php" ><img class="acercade" src="../asset/img/acerca.png"  alt="acercade"></a>

 
</footer>
</body>
</html>
<?php
  }else{
     header("location:../../loggin/index.php");
  }
  }else{
     header("location:../../loggin/index.php");
  }



  ?>
