<?php
session_start();
include('actions/protected_sesion.php');
include("menu_horizontal.php" )
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" media="screen" href="css/estilo_dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Resumen</title>
</head>

<body>
<div class='container'>

    <?php
    include("modelo/class_grafica.php");
    include("modelo/class_administrador_dal.php");
    $obj_grafica = new Grafica;
    $obj_usuario = new Administrador_dal;
    $nombre_de_usuario = $_SESSION['usuario'];

    $datos = $obj_grafica->get_all_citas_estatus($obj_usuario->getId_Trabajadorto_Lista($nombre_de_usuario));
    if ($datos == NULL) {
        print "<p>No se encontraron resultados de las citas</p>";
        
    } else {
        
    }
    ?>
    <!-- Contenido de tu página aquí -->
    <h1>Hola de nuevo, <?php print $nombre_de_usuario ?></h1>
    <p>Este es el resumen de tus citas:</p>

    <!-- Agrega un elemento HTML donde se renderizará la gráfica -->
    <canvas id="miGrafico" width="400" height="400"></canvas>

    <!-- Script para procesar los resultados y generar la gráfica -->
    <script>
        // Supongamos que $resultados contiene tu array de resultados
        var resultados = <?php echo json_encode($datos); ?>;
        console.log(resultados);

        // Preparar los datos para Chart.js
        var labels = resultados.map(function (item) {
            return item.estado;
        });

        var data = resultados.map(function (item) {
            return item.cantidad; 
        });

        // Crear el contexto del gráfico
        var ctx = document.getElementById('miGrafico').getContext('2d');

        var colores = [
            'rgba(255, 0, 0, 0.2)', // Primer color
             'rgba(75, 192, 192, 0.2)',   // Segundo color
            // Puedes agregar más colores según sea necesario
        ];

        // Crear la instancia del gráfico
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad',
                    data: data,
                    backgroundColor:  colores,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
        </div><!-- container -->
</body>

</html>