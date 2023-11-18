<?php
session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" media="screen" href="css/estilo_admin.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/valid_admin.js"></script>
    <title>Inicio de Sesión Admin</title>
</head>
<body>
    <div class='container'>
    <h1>Bienvenido, administrador</h1>
    <p class='pf'>Ingresa tus credenciales para iniciar sesión.</p>
    <form name = "login_form" method="post">

    <div id='row'>
        <div id='col-25'>
        <label id="lbl">Usuario:</label>
            </div>
        <div id='col-75'>
        <input class = "mayusculas" type="text" id="f_usuario" name="f_usuario" placeholder = "Ingrese usuario">
            </div>
    </div> <!-- row -->

    <div id='row'>
        <div id='col-25'>
        <label id="lbl">Contraseña:</label>
            </div>
        <div id='col-75'>
        <input class = "mayusculas" type="password" id="f_contraseña" name="f_contraseña" placeholder = "Ingrese contraseña">
            </div>
    </div> <!-- row -->

    <div id="row2">
            <input type="button" id="val_user" name="val_user" value="Ingresar" class="boton" onclick="javascript:valida_user();">
            </div> <!-- row3 -->
    </form>
        

            <p class='adminr'>¿Eres docente y no tienes cuenta? <a href="sitio_en_construcción.php">Registrate aquí</a></p>



</div> <!-- container -->
</body>
</html>