<?php
session_start();
include('actions/protected_sesion.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="css/estilo_lista_citas.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/catalogo_citas_func.js"></script>
    <script> </script>
    <title>Catálogo de Alumnos</title>
</head>

<body>
    <div class="container">
        <?php include("menu_horizontal.php") ?>
        <h2>Catálogo de Citas</h2>
        <?php
        include("modelo/class_citas_dal.php");
        include("modelo/class_administrador_dal.php");
        $obj_cita = new Citas_dal;
        $obj_usuario = new Administrador_dal;
        $nombre_de_usuario = $_SESSION['usuario'];

        $result_cita = $obj_cita->obtener_lista_Citastrabajador($obj_usuario->getId_Trabajadorto_Lista($nombre_de_usuario));
        if ($result_cita == NULL) {

            print "<p>No se encontraron resultados de citas</p>";
        } else {

            ?>
            <a href="idx_admin.php">
                <button id="add-btn">Agregar cita</button>
            </a>
            <label for="curp-filter">Filtrar por CURP:</label>
                <input type="text" id="curp-filter" oninput="filterTable();">
            <table>
                <tr>
                    <th>ID_Cita</th>
                    <th>Numero de Turno</th>
                    <th>Fecha-Hora</th>
                    <th>CURP</th>
                    <th>ID_Municipio</th>
                    <th>ID_Estatus</th>
                    <th>ID_Asunto</th>
                    <th>Resuelto</th>
                    <th>Pendiente</th>
                    <th>Borrar</th>
                    <th>Editar</th>
                </tr>
                <?php
                foreach ($result_cita as $key => $value) {
                    ?>
                    <tr>
                        <td>
                            <?= $value->getId_cita(); ?>
                        </td>
                        <td>
                            <?= $value->getNumero_de_turno(); ?>
                        </td>
                        <td>
                            <?= $value->getFecha_hora(); ?>
                        </td>
                        <td>
                            <?= $value->getCurp(); ?>
                        </td>
                        <td>
                            <?= $value->getId_municipio(); ?>
                        </td>
                        <td>
                            <?= $value->getId_estatus(); ?>
                        </td>
                        <td>
                            <?= $value->getId_asunto(); ?>
                        </td>
                        <td><button class="resol-btn" data-id="<?= $value->getId_cita(); ?>"
                                onclick="javascript:citaResuelta();">Resuelto</button></td>
                        <td><button class="pen-btn" data-id="<?= $value->getId_cita(); ?>"
                                onclick="javascript:citaPendiente();">Pendiente</button></td>
                        <td><button class="delete-btn" data-id="<?= $value->getId_cita(); ?>"
                                onclick="javascript:borraCita();">Borrar</button></td>
                         <td><button class="edit-btn" data-id="<?= $value->getId_cita(); ?>"
                                onclick="javascript:editaCita();">Editar</button></td>
                    </tr>
                    <?php
                } //cierre de foreach lista de personas
        } //cierre de else
        ?>
            <!-- Agrega más filas según necesites -->
        </table>
    </div>
</body>

</html>