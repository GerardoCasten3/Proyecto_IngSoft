
<?php
session_start();
include('actions/protected_sesion.php');
include("menu_horizontal.php" )
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" media="screen" href="css/estilo_idx_admin.css">
    <script src="js/valid.js"></script>
    <title>Gestión de Citas</title>
</head>
<body>

    <div class='container'>
    <h1>Sistema de Gestión de Citas</h1>
    <p>Si deseas agendar una nueva cita, rellena el formulario.</p>
    <form id="forma" action="actions/inserta_forma_admin.php" method="post" onsubmit = "return valida_forma();">

    <div id='row'>
        <div id='col-25'>
        <label id="lbl" class="cursiva">CURP:</label>
            </div>
        <div id='col-75'>
        <input class = "mayusculas" type="text" id="f_curp" name="f_curp" placeholder = "INGRESE CURP">
            </div>
    </div>

    <div id='row'>
        <div id='col-25'>
            <label id="lbl" class="cursiva">FECHA Y HORA DE LA CITA:</label>
            </div>
        <div id='col-75'>
        <input type="datetime-local" id="f_fh" name="f_fh">
            </div>
    </div>

    <div id='row'>
    <?php
            include('modelo/class_municipio_dal.php');
            $obj_lista_muni= new Municipio_dal;
            $result_muni=$obj_lista_muni->obtener_lista_municipio();
            if ($result_muni==NULL){
                    echo '<h2>No se encontraron municipios</h2>';
            }
            else{
?>     
        <div id='col-25'>
            <label id="lbl" class="cursiva">MUNICIPIO:</label>
            </div>
        <div id='col-75'>
        <select name="f_municipio" id="f_municipio">
            <option value="0">ELIGE TU MUNICIPIO DE RESIDENCIA:</option>

            <?php
            // Obtener listado de municipios mediante un ciclo foreach
                foreach ($result_muni as $key => $value){									
                        ?>
	            <option value="<?=$value->getIdMunicipio(); ?>"><?=$value->getNombredeMunicipio(); ?></option>
                        <?php } ?>                
                </select>
            </div> 
                </div>
    <?php } ?>             

    <div id='row'>
    <?php
            include('modelo/class_trabajador_dal.php');
            $obj_lista_muni= new Trabajador_dal;
            $result_trabajador=$obj_lista_muni->obtener_lista_trabajador();
            if ($result_trabajador==NULL){
                    echo '<h2>No se encontraron trabajadores</h2>';
            }
            else{
?>    
        <div id='col-25'>
            <label id="lbl" class="cursiva">DOCENTE:</label>
            </div>
        <div id='col-75'>
        <select name="f_docente" id="f_docente">
            <option value="0">ELIGE AL DOCENTE:</option>
            
            <?php
            // Obtener listado de trabajadores mediante un ciclo foreach
                foreach ($result_trabajador as $key => $value){									
                        ?>
	            <option value="<?=$value->getId_trabajador(); ?>"><?=$value->getNombre(); ?> <?=$value->getApellido_paterno(); ?> <?=$value->getApellido_materno();?></option>
                        <?php } ?>     

            </select>
            </div>
    </div>
    <?php } ?>  

    <div id='row'>
    <?php
            include('modelo/class_asuntos_dal.php');
            $obj_lista_muni= new Asuntos_dal;
            $result_asunto=$obj_lista_muni->obtener_lista_asuntos();
            if ($result_asunto==NULL){
                    echo '<h2>No se encontraron asuntos</h2>';
            }
            else{
?>    
        <div id='col-25'>
            <label id="lbl" class="cursiva">ASUNTO A TRATAR:</label>
            </div>
        <div id='col-75'>
        <select name="f_asunto" id="f_asunto">
            <option value="0">ELIGE EL ASUNTO:</option>
            
            <?php
            // Obtener listado de trabajadores mediante un ciclo foreach
                foreach ($result_asunto as $key => $value){									
                        ?>
	            <option value="<?=$value->getId_asunto(); ?>"><?=$value->getDescripcion_asunto();?></option>
                        <?php } ?>     

        </select>
            </div>
    </div>
    <?php } ?>  

    <div id="row3">
            <input type="submit" class = "boton" id="f_guarda" value="AGENDAR CITA"></input>
            </div>         

    </form>    
    </div><!-- container -->
</body>
</html>