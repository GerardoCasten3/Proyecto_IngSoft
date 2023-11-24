<?php
if (isset($_POST['id_cita'])) {
    $ID_CITA = $_POST['id_cita'];

    include("../modelo/class_citas_dal.php");
    $obj_cita_dal = new Citas_dal();
    $existe = $obj_cita_dal->actualiza_citaPendiente($ID_CITA);
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