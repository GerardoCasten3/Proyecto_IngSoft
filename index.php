<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" media="screen" href="css/estilo_proy.css">
    <script src="js/valid.js"></script>
    <title>Gestión de Citas</title>
</head>
<body>
    <div class='container'>
    <h1>Sistema de Gestión de Citas</h1>
    <p>Si deseas agendar una nueva cita, rellena el formulario.</p>
    <form id="forma" action="actions/inserta_forma.php" method="post" onsubmit = "return valida_forma();">

    <div id='row'>
        <div id='col-25'>
        <label id="lbl" class="cursiva">CURP:</label>
            </div>
        <div id='col-75'>
        <input class = "mayusculas" type="text" id="f_curp" name="f_curp" placeholder = "Ingrese CURP">
            </div>
    </div>

    <div id='row'>
        <div id='col-25'>
            <label id="lbl" class="cursiva">Fecha y Hora de la Cita:</label>
            </div>
        <div id='col-75'>
        <input type="datetime-local" id="f_fh" name="f_fh">
            </div>
    </div>

    <div id='row'>
        <div id='col-25'>
            <label id="lbl" class="cursiva">Municipio:</label>
            </div>
        <div id='col-75'>
        <select name="f_municipio" id="f_municipio">
            <option value="0">Elige tu municipio de residencia:</option>
            <option value="1">Saltillo</option>
            <option value="2">Monclova</option>
            <option value="3">Torreón</option>
            <option value="4">Piedras Negras</option>
            </select>
            </div>
    </div>

    <div id='row'>
        <div id='col-25'>
            <label id="lbl" class="cursiva">Docente:</label>
            </div>
        <div id='col-75'>
        <select name="f_docente" id="f_docente">
            <option value="0">Elige el docente al que te dirigirás:</option>
            <option value="1">Docente 1</option>
            <option value="2">Docente 2</option>
            <option value="3">Docente 3</option>
            </select>
            </div>
    </div>

    <div id='row'>
        <div id='col-25'>
            <label id="lbl" class="cursiva">Asunto a tratar:</label>
            </div>
        <div id='col-75'>
        <select name="f_asunto" id="f_asunto">
            <option value="0">Elige el asunto a tratar:</option>
            <option value="1">Asunto 1</option>
            <option value="2">Asunto 2</option>
            <option value="3">Asunto 3</option>
        </select>
            </div>
    </div>

    <div id="row3">
            <input type="submit" class = "boton" id="f_guarda" value="Agendar cita"></input>
            </div>         

     <p class="adminp">¿Eres administrador? <a href="admin_login.php">Inicia sesión aquí</a></p>


    

    
    </div><!-- container -->
</body>
</html>