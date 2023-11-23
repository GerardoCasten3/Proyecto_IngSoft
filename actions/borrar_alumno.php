<?php
if (isset($_POST['curp'])) {
    $CURP = $_POST['curp'];

    include("../modelo/class_alumno_dal.php");
    $obj_alumno_dal = new Alumno_dal;
    $existe = $obj_alumno_dal->borra_alumno($CURP);
    if ($existe == 1) {
        echo 'true';
    } else if ($existe != 1) {
        print 'Error: Algo salió mal, vuelva a intentar';
    } else {
        print 'Error: Algo salió mal, vuelva a intentar';
    }
} else {
    print 'No pude recoger los datos del formulario(post), Error web page en login';
}


?>