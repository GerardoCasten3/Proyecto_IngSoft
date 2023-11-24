<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('actions/protected_sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" media="screen" href="css/estilo_menu.css">
</head>
<body>

<nav>
    <a href="dashboard.php">Resumen</a>
    <a href="idx_admin.php">Registro</a>
    <div class="dropdown">
        <button class="dropbtn">Catálogos</button>
        <div class="dropdown-content">
            <a href="lista_alumnos.php">Alumnos</a>
            <a href="lista_citas.php">Citas</a>
        </div>
    </div>
    <a href="actions/cerrar_sesion.php">Cerrar Sesión</a>
</nav>

</body>
</html>