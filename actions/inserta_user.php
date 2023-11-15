<?php
if($_POST){
    $user = isset($_POST["f_usuario"]) ? $user = strtoupper($_POST["f_usuario"]) : $user = null;
    $password = isset($_POST["f_contraseña"]) ? $password = strtoupper($_POST["f_contraseña"]) : $password = null;
    
    echo $user.'/'. $password;

}
?>