<?php
session_start();
       if (isset($_POST['usuario']) && isset($_POST['contra'])){
            $usu=$_POST['usuario'];
            $contra=$_POST['contra'];
            include("../modelo/class_administrador_dal.php");
            $obj_usuario=new Administrador_dal;
            $existe=$obj_usuario->verify_user($usu,$contra);

            if ($existe==1) {
                      //session_start();
                      $_SESSION['usuario']=$usu;
                      echo 'true';
            }
            else if ($existe!=1){
                print 'Error: Usuario o contraseña inválidos, vuelva a intentar';
                }
            else {
                print 'Error: Código de seguridad incorrecto, vuelva a intentar';
                }
    }
    else{
        print 'No pude recoger los datos del formulario(post), Error web page en login';
    }
?>