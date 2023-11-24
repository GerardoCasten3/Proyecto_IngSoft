function validateCURP(id){
  let regexCurp = /^[A-Z]{4}\d{6}[HM][A-Z]{5}[0-9A-Z]{2}$/;
  if(regexCurp.test(id)){
      return true;
  }
      else{
          return false;
      }
}

function validateEmail(correo){
  //let regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  let regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(?:\.[a-zA-Z]{2,})?$/;

  if(regexCorreo.test(correo)){
      return true;
  }
      else{
          return false;
      }
}

function validateNumber(telefono){
  let regexEntero = /^-?\d+$/ 
  if(regexEntero.test(telefono)){
      return true;
  }
      else{
          return false;
      }
}


function agregaAlumno() {
  var curp = prompt("Ingrese su CURP").trim();
  if (curp.length == 0) {
    while (curp.length == 0) {
      alert("Registre su CURP, no puede ir vacío, verifique.");
      curp = prompt("Ingrese su CURP").trim();
    }
  }
  if(curp.length > 0){
    while (!validateCURP(curp)) {
      alert("El curp no es válido, verifique.");
      curp = prompt("Ingrese su CURP").trim();
    }
  }


  var nombre = prompt("Ingrese sus nombres");
  if (nombre.length == 0) {
    while (nombre.length == 0) {
      alert("Registre su nombre, no puede ir vacío, verifique.");
      nombre = prompt("Ingrese sus nombres");
    }
  }

  var apellidoPaterno = prompt("Ingrese su apellido paterno").trim();
  if (apellidoPaterno.length == 0) {
    while (apellidoPaterno.length == 0) {
      alert("Registre su apellido paterno, no puede ir vacío, verifique.");
      apellidoPaterno = prompt("Ingrese su apellido paterno").trim();
    }
  }

  var apellidoMaterno = prompt("Ingrese su apellido materno").trim();
  if (apellidoMaterno.length == 0) {
    while (apellidoMaterno.length == 0) {
      alert("Registre su apellido materno, no puede ir vacío, verifique.");
      apellidoMaterno = prompt("Ingrese su apellido materno").trim();
    }
  }

  var telefono = prompt("Ingrese su telefono").trim();
  if (telefono.length == 0) {
    while (telefono.length == 0) {
      alert("Registre su telefono, no puede ir vacío, verifique.");
      telefono = prompt("Ingrese su telefono").trim();
    }
  }

  if(telefono.length > 0){
    while (!validateNumber(telefono)) {
      alert("El telefono no es válido, verifique.");
      telefono = prompt("Ingrese su telefono").trim();
    }
  }

  var correo = prompt("Ingrese su correo").trim();
  if (correo.length == 0) {
    while (correo.length == 0) {
      alert("Registre su correo, no puede ir vacío, verifique.");
      correo = prompt("Ingrese su correo").trim();
    }
  }

  if(correo.length > 0){
    while (!validateEmail(correo)) {
      alert("El correo no es válido, verifique.");
      curp = prompt("Ingrese su correo").trim();
    }
  }

  var idMunicipio = prompt("Ingrese su municipio");
  if (idMunicipio.length == 0) {
    while (idMunicipio.length == 0) {
      alert("Registre su idMunicipio, no puede ir vacío, verifique.");
      idMunicipio = prompt("Ingrese su municipio");
    }
  }

  var idNivel = prompt("Ingrese su nivel").trim();
  if (idNivel.length == 0) {
    while (idNivel.length == 0) {
      alert("Registre su idNivel, no puede ir vacío, verifique.");
      idNivel = prompt("Ingrese su nivel").trim();
    }
  }

  var datos = {
    curp: curp,
    nombre: nombre,
    apellidoPaterno: apellidoPaterno,
    apellidoMaterno: apellidoMaterno,
    telefono: telefono,
    correo: correo,
    idMunicipio: idMunicipio,
    idNivel: idNivel,
  };
  $.ajax({
    url: "http://localhost/proyecto_ingsoft/actions/agregar_alumno.php",
    type: "POST",
    dataType: "html",
    data: datos,
    success: function (response) {
      console.log(response);
      if (response == "true") {
        window.location.href =
          "http://localhost/Proyecto_IngSoft/lista_alumnos.php";
      } else {
        Swal.fire({
          icon: "error",
          title: "Error: Datos incorrectos vuelva a intentar.",
          text: "¡Verificar, por favor!",
        });
      }
    },
    error: function (xhr, desc, err) {
      console.log(xhr);
      console.log("Details: " + desc + "\nError:" + err);
    },
  });
}

function borraAlumno() {
  var deleteButtons = document.querySelectorAll(".delete-btn");

  deleteButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var curp = button.getAttribute("data-curp");

      Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, borrarlo",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.isConfirmed) {
          console.log("Borrando alumno con CURP:", curp);

          var datos = { curp: curp };
          $.ajax({
            url: "http://localhost/proyecto_ingsoft/actions/borrar_alumno.php",
            type: "POST",
            dataType: "html",
            data: datos,
            success: function (response) {
              if (response == "true") {
                window.location.href =
                  "http://localhost/Proyecto_IngSoft/lista_alumnos.php";
              } else {
                Swal.fire({
                  icon: "error",
                  title: "Error: No se ha podido eliminar.",
                  text: "¡Vuelve a intentarlo!",
                });
              }
            },
            error: function (xhr, desc, err) {
              console.log(xhr);
              console.log("Details: " + desc + "\nError:" + err);
            },
          });
        }
      });
    });
  });
}

function editaAlumno() {
  var editeButtons = document.querySelectorAll(".edit-btn");

  editeButtons.forEach(function (button) {
    button.addEventListener("click", function () {

      var curp = button.getAttribute("data-curp");

      var nombre = prompt("Ingrese sus nombres");
      if (nombre.length == 0) {
        while (nombre.length == 0) {
          alert("Registre su nombre, no puede ir vacío, verifique.");
          nombre = prompt("Ingrese sus nombres");
        }
      }

      var apellidoPaterno = prompt("Ingrese su apellido paterno").trim();
      if (apellidoPaterno.length == 0) {
        while (apellidoPaterno.length == 0) {
          alert("Registre su apellido paterno, no puede ir vacío, verifique.");
          apellidoPaterno = prompt("Ingrese su apellido paterno").trim();
        }
      }

      var apellidoMaterno = prompt("Ingrese su apellido materno").trim();
      if (apellidoMaterno.length == 0) {
        while (apellidoMaterno.length == 0) {
          alert("Registre su apellido materno, no puede ir vacío, verifique.");
          apellidoMaterno = prompt("Ingrese su apellido materno").trim();
        }
      }

      var telefono = prompt("Ingrese su telefono").trim();
      if (telefono.length == 0) {
        while (telefono.length == 0) {
          alert("Registre su telefono, no puede ir vacío, verifique.");
          telefono = prompt("Ingrese su telefono").trim();
        }
      }

      if(telefono.length > 0){
        while (!validateNumber(telefono)) {
          alert("El telefono no es válido, verifique.");
          telefono = prompt("Ingrese su telefono").trim();
        }
      }


      var correo = prompt("Ingrese su correo").trim();
      if (correo.length == 0) {
        while (correo.length == 0) {
          alert("Registre su correo, no puede ir vacío, verifique.");
          correo = prompt("Ingrese su correo").trim();
        }
      }

      if(correo.length > 0){
        while (!validateEmail(correo)) {
          alert("El correo no es válido, verifique.");
          curp = prompt("Ingrese su correo").trim();
        }
      }

      var idMunicipio = prompt("Ingrese su municipio").trim();
      if (idMunicipio.length == 0) {
        while (idMunicipio.length == 0) {
          alert("Registre su idMunicipio, no puede ir vacío, verifique.");
          idMunicipio = prompt("Ingrese su municipio").trim();
        }
      }

      var idNivel = prompt("Ingrese su nivel").trim();
      if (idNivel.length == 0) {
        while (idNivel.length == 0) {
          alert("Registre su idNivel, no puede ir vacío, verifique.");
          idNivel = prompt("Ingrese su nivel").trim();
        }
      }

      var datos = {
        curp: curp,
        nombre: nombre,
        apellidoPaterno: apellidoPaterno,
        apellidoMaterno: apellidoMaterno,
        telefono: telefono,
        correo: correo,
        idMunicipio: idMunicipio,
        idNivel: idNivel,
      };

      $.ajax({
        url: "http://localhost/proyecto_ingsoft/actions/edita_alumno.php",
        type: "POST",
        dataType: "html",
        data: datos,
        success: function (response) {
            console.log(response);
          if (response == "true") {
            window.location.href = "http://localhost/Proyecto_IngSoft/lista_alumnos.php";
          } else {
            Swal.fire({
              icon: "error",
              title: "Error: Datos incorrectos vuelva a intentar.",
              text: "¡Verificar, por favor!",
            });
          }
        },
        error: function (xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        },
      });

    });
  });
}
