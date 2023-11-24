<?php
require_once '../php/func_validates.php';

       if (isset($_POST['curp']) && isset($_POST['nombre']) && isset($_POST['apellidoPaterno']) && isset($_POST['apellidoMaterno']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['idMunicipio']) && isset($_POST['idNivel'])){
            $CURP=strtoupper($_POST['curp']);
            if(validaCURP($CURP)==false){
                print 'Error: CURP no válida';
                exit;
            }
            $NOMBRE=strtoupper($_POST['nombre']);
            if(validaRequerido($NOMBRE)==false){
                print 'Error: Nombre no válido';
                exit;
            }

            $APELLIDO_PATERNO=strtoupper($_POST['apellidoPaterno']);
            if(validaRequerido($APELLIDO_PATERNO)==false){
                print 'Error: Apellido Paterno no válido';
                exit;
            }

            $APELLIDO_MATERNO=strtoupper($_POST['apellidoMaterno']);
            if(validaRequerido($APELLIDO_MATERNO)==false){
                print 'Error: Apellido Materno no válido';
                exit;
            }

            $TELEFONO=$_POST['telefono'];
            if(validarNumerico($TELEFONO)==false){
                print 'Error: Teléfono no válido';
                exit;
            }

            $CORREO=$_POST['correo'];
            if(validaEmail($CORREO)==false){
                print 'Error: Correo no válido';
                exit;
            }

            $ID_MUNICIPIO=strtoupper($_POST['idMunicipio']);
            if(validaRequerido($ID_MUNICIPIO)==false){
                print 'Error: ID Municipio no válido';
                exit;
            }
            include("../modelo/class_municipio_dal.php");
            include("../modelo/class_municipio.php");
            $obj_muni_dal=new Municipio_dal;
            $id_muni= new Municipio;
            $id_muni=$obj_muni_dal->datos_por_nombre($ID_MUNICIPIO);
            $idnuevo_Municipio = $id_muni->getIdMunicipio();


            $ID_NIVEL=strtoupper($_POST['idNivel']);
            if(validaRequerido($ID_NIVEL)==false){
                print 'Error: ID Nivel no válido';
                exit;
            }
            include("../modelo/class_nivel_dal.php");
            include("../modelo/class_nivel.php");
            $obj_nivel_dal=new Nivel_dal;
            $id_nivel= new Nivel;
            $id_nivel=$obj_nivel_dal->datos_por_nombre($ID_NIVEL);
            $idnuevo_Nivel = $id_nivel->getId_nivel();

            include("../modelo/class_alumno_dal.php");
            $obj_alumno_dal=new Alumno_dal;
            $obj_alumno = new Alumno($CURP,$NOMBRE,$APELLIDO_PATERNO,$APELLIDO_MATERNO,$TELEFONO,$CORREO,$idnuevo_Municipio,$idnuevo_Nivel);
            $existe=$obj_alumno_dal->inserta_alumno($obj_alumno);

            if ($existe==1) {
                echo 'true';
            }
            else if ($existe!=1){
                print 'Error: Algo salió mal, vuelva a intentar';
                }
            else {
                print 'Error: Algo salió mal, vuelva a intentar';
                }
    }
    else{
        print 'No pude recoger los datos del formulario(post), Error web page en login';
    }
?>