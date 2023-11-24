<!DOCTYPE html>
<html>

<head>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>
    <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
    <script src="../js/sweetalert2.all.min.js" type="text/javascript"></script>
</head>

</html>


<?php
if ($_POST) {
    $curp = isset($_POST["f_curp"]) ? $curp = strtoupper($_POST["f_curp"]) : $curp = null;
    $fecha_hora = isset($_POST["f_fh"]) ? $fecha_hora = strtoupper($_POST["f_fh"]) : $fecha_hora = null;
    $municipio = isset($_POST["f_municipio"]) ? $municipio = strtoupper($_POST["f_municipio"]) : $municipio = null;
    $docente = isset($_POST["f_docente"]) ? $docente = strtoupper($_POST["f_docente"]) : $docente = null;
    $asunto = isset($_POST["f_asunto"]) ? $asunto = strtoupper($_POST["f_asunto"]) : $asunto = null;


    //Validaciones para el servidor
    require_once '../php/func_validates.php';
    $errores = array();


    if (!validaCURP($curp)) {
        $errores[] = 'El campo curp no cumple formato adecuado';
    }

    if (!validaDateTime($fecha_hora)) {
        $errores[] = 'El campo fecha y hora no cumple formato adecuado';
    }

    if (!validarEntero($municipio)) {
        $errores[] = 'El campo municipio no cumple formato adecuado';
    }

    if (!validarEntero($docente)) {
        $errores[] = 'El campo docente no cumple formato adecuado';
    }

    if (!validarEntero($asunto)) {
        $errores[] = 'El campo asunto no cumple formato adecuado';
    }

    //LOGICA INSERCION
    try {
        if (!$errores) {
            include("../modelo/class_citas_dal.php");
            $metodos_cita = new Citas_dal;
            $obj_cita = new Citas(null, null, $fecha_hora, $curp, $docente, $municipio, 1, $asunto);
            if ($metodos_cita->inserta_citas($obj_cita) == 1) {
                print '<script>';
                print 'Swal.fire({
                  title: "Registro de Cita",
                  icon: "success",
                  html: "Cita Agregada Correctamente!<br><br>' .
                  'CURP: ' . $curp . '<br>' .
                     'Fecha: ' . $fecha_hora . '<br>' .
                                 'Número de Turno: ' . $metodos_cita->getNumeroDeTurnoDespuesDeInsercion() . '",
                  type: "success"
                  }).then(function() {
                    window.location = "../idx_admin.php";
                  });';
                print '</script>';
            } else { //inserta problema
                print '<script>';
                print 'Swal.fire({
                  title: "Registro de Cita",
                  text: "Ocurrió un error al tratar de guardar su cita. La cita no se registró correctamente, vuelva a intentar",
                  icon: "error",
                  type: "error"
                  }).then(function() {
                window.location = "../idx_admin.php";
                  });';
                print '</script>';
            }
        } else {
            echo '<ul style="color:red;font-size:25px">';
            foreach ($errores as $error):
                echo '<li>' . $error . '</li>';
            endforeach;
            echo '</ul>';
        } //end errores
    } //end try
    catch (Exception $e) {
        print '<script>';
        print 'Swal.fire({
      title: "Registro de Cita",
      text: "Ocurrió un error al tratar de guardar su cita. Verifique estar dado de alta en el sistema, si el problema persiste contacte al docente.",
      icon: "error",
      type: "error"
      }).then(function() {
    window.location = "../idx_admin.php";
      });';
        print '</script>';
    } //end catch


} //end if post

?>