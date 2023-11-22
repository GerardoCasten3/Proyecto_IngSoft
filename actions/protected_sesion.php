<?php
//session_start();
if (!isset($_SESSION['usuario']))
{
    header("Location: http://localhost/Proyecto_IngSoft/admin_login.php");
} 
?>