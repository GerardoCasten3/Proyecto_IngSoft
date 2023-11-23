<?php
session_start();
include('actions/protected_sesion.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="css/estilo_lista_alumnos.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/catalogo_func.js"></script>
    <title>Catálogo de Alumnos</title>
</head>

<body>
    <div class="container">
        <h2>Catálogo de Alumnos</h2>
        <?php
        include("modelo/class_alumno_dal.php");
        $obj_alumno = new Alumno_dal;

        $result_alumno = $obj_alumno->obtener_lista_Alumnos();

        if ($result_alumno == NULL) {

            print "<p>No se encontraron resultados de cursos</p>";
        } else {
        }
        ?>
        <button id="add-btn" onclick="javascript:agregaAlumno();">Agregar alumno</button>
        <table>
            <tr>
                <th>CURP</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>ID Municipio</th>
                <th>ID Nivel</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            <?php
            foreach ($result_alumno as $key => $value) {
                ?>
                <tr>
                    <td><?= $value->getCurp(); ?></td>
                    <td><?= $value->getNombre(); ?></td>
                    <td><?= $value->getApellido_paterno(); ?></td>
                    <td><?= $value->getApellido_materno(); ?></td>
                    <td><?= $value->getTelefono(); ?></td>
                    <td><?= $value->getCorreo(); ?></td>
                    <td><?= $value->getId_municipio(); ?></td>
                    <td><?= $value->getId_nivel(); ?></td>
                    <td><button class="edit-btn" data-curp="<?=$value->getCurp();?>" onclick="javascript:editaAlumno();">Editar</button></td>
                    <td><button class="delete-btn" data-curp="<?=$value->getCurp();?>" onclick="javascript:borraAlumno();">Borrar</button></td>
                </tr>
                <?php
            } //cierre de foreach lista de personas
            ?>
            <!-- Agrega más filas según necesites -->
        </table>
    </div>
</body>

</html>