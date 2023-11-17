<?php
session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" media="screen" href="css/estilo_admin.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>

function valida_user(){
    var usuario=$( "#f_usuario" ).val().trim();
    var contra=$( "#f_contraseña" ).val().trim();

    if (usuario.length==0){
      alert("Registre un usuario, no puede ir vacío, verifique.");
    }
    else if (contra.length==0){
        alert("Registre una contraseña, no puede ir vacío, verifique.");
    }
    else{
       var datos={usuario:usuario,contra:contra};
  $.ajax({
              url: 'actions/verifica_user.php',
              type: 'POST',
              dataType: 'html',
              data: datos,
              success: function(response){
                
              
                if(response=="true")
                  {
  
                     window.location.href = "index.php";
                }else{
                      Swal.fire({
                      type: 'error',
                      title: 'Error: Datos incorrectos vuelva a intentar.',
                      text: '¡Verificar, por favor!'});
                }         
              },
                error: function(xhr, desc, err) {
                  console.log(xhr);
                  console.log("Details: " + desc + "\nError:" + err);
                }
  });
    }
  }
    </script>
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