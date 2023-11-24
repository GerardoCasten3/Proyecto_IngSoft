function borraCita() {
    var deleteButtons = document.querySelectorAll(".delete-btn");
  
    deleteButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        var id_cita = button.getAttribute("data-id");
  
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
            console.log("Borrando cita con ID:", id_cita);
  
            var datos = { id_cita: id_cita };
            $.ajax({
              url: "http://localhost/proyecto_ingsoft/actions/borrar_cita.php",
              type: "POST",
              dataType: "html",
              data: datos,
              success: function (response) {
                if (response == "true") {
                  window.location.href =
                    "http://localhost/Proyecto_IngSoft/lista_citas.php";
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

  function citaResuelta() {
    var deleteButtons = document.querySelectorAll(".resol-btn");
  
    deleteButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        var id_cita = button.getAttribute("data-id");
  
        Swal.fire({
          title: "¿Marcar cita como resuelta?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Sí, actualizar.",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
            console.log("Actualizando cita con ID:", id_cita);
  
            var datos = { id_cita: id_cita };
            $.ajax({
              url: "http://localhost/proyecto_ingsoft/actions/cita_resuelta.php",
              type: "POST",
              dataType: "html",
              data: datos,
              success: function (response) {
                if (response == "true") {
                  window.location.href =
                    "http://localhost/Proyecto_IngSoft/lista_citas.php";
                } else {
                  Swal.fire({
                    icon: "error",
                    title: "Error: No se ha podido actualizar.",
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

  function citaPendiente() {
    var deleteButtons = document.querySelectorAll(".pen-btn");
  
    deleteButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        var id_cita = button.getAttribute("data-id");
  
        Swal.fire({
          title: "¿Marcar cita como pendiente?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Sí, actualizar.",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
            console.log("Actualizando cita con ID:", id_cita);
  
            var datos = { id_cita: id_cita };
            $.ajax({
              url: "http://localhost/proyecto_ingsoft/actions/cita_pendiente.php",
              type: "POST",
              dataType: "html",
              data: datos,
              success: function (response) {
                if (response == "true") {
                  window.location.href =
                    "http://localhost/Proyecto_IngSoft/lista_citas.php";
                } else {
                  Swal.fire({
                    icon: "error",
                    title: "Error: No se ha podido actualizar.",
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

  function editaCita(){
    var deleteButtons = document.querySelectorAll(".edit-btn");
  
    deleteButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        var id_cita = button.getAttribute("data-id");
        console.log(id_cita);
        var fecha_hora = prompt("Introduce la fecha y hora a actualizar (YYYY-MM-DD HH:mm:ss):");
            var datos = { id_cita: id_cita, fecha_hora: fecha_hora };
            console.log("Actualizando cita con id:", id_cita, " con fecha y hora nueva: ", fecha_hora);

            $.ajax({
              url: "http://localhost/proyecto_ingsoft/actions/editar_cita.php",
              type: "POST",
              dataType: "html",
              data: datos,
              success: function (response) {
                if (response == "true") {
                  window.location.href =
                    "http://localhost/Proyecto_IngSoft/lista_citas.php";
                } else {
                  Swal.fire({
                    icon: "error",
                    title: "Error: No se ha podido actualizar.",
                    text: "¡Vuelve a intentarlo!",
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

  function filterTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("curp-filter");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");  
    tr = table.getElementsByTagName("tr");

    // Recorre todas las filas de la tabla y oculta las que no coincidan con el filtro
    for (i = 1; i < tr.length; i++) {  // Comienza desde 1 para omitir la fila de encabezado
        td = tr[i].getElementsByTagName("td")[3];  // Cambia el índice según la posición de la columna CURP
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
  