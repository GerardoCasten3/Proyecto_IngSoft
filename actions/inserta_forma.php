<?php
if($_POST){
    $curp = isset($_POST["f_curp"]) ? $curp = strtoupper($_POST["f_curp"]) : $curp = null;
    $fecha_hora = isset($_POST["f_fh"]) ? $fecha_hora = strtoupper($_POST["f_fh"]) : $fecha_hora = null;
    $municipio = isset($_POST["f_municipio"]) ? $municipio = strtoupper($_POST["f_municipio"]) : $municipio = null;
    $docente = isset($_POST["f_docente"]) ? $docente = strtoupper($_POST["f_docente"]) : $docente = null;
    $asunto = isset($_POST["f_asunto"]) ? $asunto = strtoupper($_POST["f_asunto"]) : $asunto = null;


    echo $curp.'/'.$fecha_hora.'/'.$municipio.'/'.$docente.'/'.$asunto;






}
?>