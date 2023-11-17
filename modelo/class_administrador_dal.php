<?php
include('class_administrador.php');
include('class_db.php');

    class Administrador_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        //Obtener listado
    function verify_user($user,$password){
       $elsql ="Select id_admin from administrador where usuario='$user' and contraseña='$password'";
        $this->set_sql( $elsql);
    	$rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
            //if($total_de_registro==1){
            if($total_de_registro>0){
                return 1;
            }
            else{
                return 0;
            }
            mysqli_free_result($rs);
     }

     function delete_admin($id){
        $sql = "delete from administrador where id_admin=$id";
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        if(mysqli_affected_rows($this->db_conn)==1) {
            $borrado=1;
        }else{
            $borrado=0;
        }
        return $borrado;
    }

    function insert_admin($obj){
        $fecha=date("Y-m-d H:i:s");
        $sql = "insert into administrador (";
        $sql .= "usuario,";
        $sql .= "contraseña,";
        $sql .= "id_trabajador";
        $sql .= ") ";
        $sql .= "values(";
        $sql .= "'".$obj->getUsuario()."',";
        $sql .= "'".$obj->getContraseña()."',";
        $sql .= "'".$obj->getId_trabajador()."'";
        $sql .= ")";
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        if(mysqli_affected_rows($this->db_conn)==1) {
            $insertado=1;
        }else{
            $insertado=0;
        }
        unset($obj);
        return $insertado;
    }

    function actualiza_usuarios($obj){
        $fecha=date("Y-m-d H:i:s");

        $sql = "update administrador set ";
        $sql .= "usuario="."'".$obj->getUsuario()."',";
        $sql .= "contraseña="."'".$obj->getContraseña()."',";
        $sql .= "id_trabajador="."'".$obj->getId_trabajador()."'";
        $sql .= " where id_admin = ".$obj->getId_admin();
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        if(mysqli_affected_rows($this->db_conn)==1) {
            $actualizado=1;
        }else{
            $actualizado=0;
        }
        unset($obj);
        return $actualizado;
    }
        
    }

?>