<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles1.css">
    <title>login</title>
</head>

<body>
    <header class="fadeInDown">
        <h2 id="title1">Institucion Educativa Bertha Suttner</h2>
        <img src="img/berthasuttner1.jpg" alt="logo" id="imagen">
    </header>
    <div class="container">
        <div class="form-container">
            <img src="img/berthasuttner1.jpg" alt="login" id="ima">
            <form action="mostrar.php" method="POST">
                <h3 class="titulo">Iniciar sesión</h3>
                <div class="input-info">
                    <input type="text" name="identidad_id" id="usuario" required>
                    <i class="fa fa-user"></i>
                    <label class="floating">Identificacion</label>
                </div>
                <div class="input-info">
                    <input type="password" name="pass" id="password" required>
                    <i class="fa fa-lock"></i>
                    <label class="floating">Contraseña</label>
                </div>
                <div class="button-lado">
                    <button type="submit" class="btn solid"><span class="fa fa-arrow-circle-right fa-lg"></span> Entrar</button>
                    <button type="reset" class="btn solid"><span class="fa fa-trash fa-lg"></span> Borrar</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>