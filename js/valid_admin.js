function valida_user(){
    var usuario=$( document.getElementById("f_usuario") ).val().trim();
    var contra=$( document.getElementById("f_contraseña") ).val().trim();

    if (usuario.length==0){
      alert("Registre un usuario, no puede ir vacío, verifique.");
    }
    else if (contra.length==0){
        alert("Registre una contraseña, no puede ir vacío, verifique.");
    }
    else{
       var datos={usuario:usuario,contra:contra};
  $.ajax({
              url: 'http://localhost/proyecto_ingsoft/actions/verifica_user.php',
              type: 'POST',
              dataType: 'html',
              data: datos,
              success: function(response){
                
              
                if(response=="true")
                  {
  
                     window.location.href = "http://localhost/Proyecto_IngSoft/index.php";
                }else{
                      Swal.fire({
                      icon: 'error',
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