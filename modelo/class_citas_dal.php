<?php
include('class_citas.php');
include('class_db.php');

class Citas_dal extends class_db
{
    function __construct()
    {
        parent::__construct();
    }

    function __destruct()
    {
        parent::__destruct();
    }




    //Obtener datos de una cita por id
    function datos_por_id($id)
    {
        $id = $this->db_conn->real_escape_string($id);
        $sql = "select * from citas where id_cita='$id'";
        $this->set_sql($sql);
        $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        $total_citas = mysqli_num_rows($result);
        $obj_det = null;
        if ($total_citas == 1) {
            $renglon = mysqli_fetch_assoc($result);
            $obj_det = new Citas(
                $renglon["id_cita"],
                $renglon["numero_de_turno"],
                $renglon["fecha_hora"],
                $renglon["curp"],
                $renglon["id_trabajador"],
                $renglon["id_municipio"],
                $renglon["id_estatus"],
                $renglon["id_asunto"]
            );
        }
        return $obj_det;
    }

    function obtener_lista_Citas()
    {
        $sql="select * from citas";
        $this->set_sql($sql);
        $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $total_citas=mysqli_num_rows($rs);
        $obj_det=null;



        if ($total_citas>0){
            $i=0;
            while ($renglon = mysqli_fetch_assoc($rs)){
                $obj_det=new Citas(
                    $renglon["id_cita"],
                    $renglon["numero_de_turno"],
                    $renglon["fecha_hora"],
                    $renglon["curp"],
                    $renglon["id_trabajador"],
                    $renglon["id_municipio"],
                    $renglon["id_estatus"],                                            
                    $renglon["id_asunto"]
                    );



                $i++;
                $lista[$i]=$obj_det;
                unset($obj_det);
            }//end while    
                return $lista;
        }//end if    
    }//end function    

    //Obtener listado de citas por id de trabajador
    function obtener_lista_CitasTrabajador($id)
    {
        $sql="select * from citas where id_trabajador='$id'";
        $this->set_sql($sql);
        $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $total_citas=mysqli_num_rows($rs);
        $obj_det=null;

        if ($total_citas>0){
            $i=0;
            while ($renglon = mysqli_fetch_assoc($rs)){
                $obj_det=new Citas(
                    $renglon["id_cita"],
                    $renglon["numero_de_turno"],
                    $renglon["fecha_hora"],
                    $renglon["curp"],
                    $renglon["id_trabajador"],
                    $renglon["id_municipio"],
                    $renglon["id_estatus"],                                            
                    $renglon["id_asunto"]
                    );
                $i++;
                $lista[$i]=$obj_det;
                unset($obj_det);
            }//end while    
                return $lista;
        }//end if    
    }//end function    

    function obtener_lista_CitasTrabajadorCURP($id, $CURP)
    {
        $sql="select * from citas where id_trabajador='$id' AND curp='$CURP'";
        $this->set_sql($sql);
        $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $total_citas=mysqli_num_rows($rs);
        $obj_det=null;

        if ($total_citas>0){
            $i=0;
            while ($renglon = mysqli_fetch_assoc($rs)){
                $obj_det=new Citas(
                    $renglon["id_cita"],
                    $renglon["numero_de_turno"],
                    $renglon["fecha_hora"],
                    $renglon["curp"],
                    $renglon["id_trabajador"],
                    $renglon["id_municipio"],
                    $renglon["id_estatus"],                                            
                    $renglon["id_asunto"]
                    );
                $i++;
                $lista[$i]=$obj_det;
                unset($obj_det);
            }//end while    
                return $lista;
        }//end if    
    }//end function    

    //Insertar una cita nueva en la base de datos
    function inserta_citas($obj)
    {
        $sql = "insert into citas (";
        $sql .= "id_municipio,";
        $sql .= "fecha_hora,";
        $sql .= "curp,";
        $sql .= "id_trabajador,";
        $sql .= "id_estatus,";
        $sql .= "id_asunto";
        $sql .= ") ";
        $sql .= "values(";
        $sql .= "'" . $obj->getId_municipio() . "',";
        $sql .= "'" . $obj->getFecha_hora() . "',";
        $sql .= "'" . $obj->getCurp() . "',";
        $sql .= "'" . $obj->getId_trabajador() . "',";
        $sql .= "'" . $obj->getId_estatus() . "',";
        $sql .= "'" . $obj->getId_asunto() . "'";
        $sql .= ")";
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");

        mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        if (mysqli_affected_rows($this->db_conn) == 1) {
            $insertado = 1;
        } else {
            $insertado = 0;
        }
        unset($obj);
        return $insertado;
    }

    //Actualizar una cita en la base de datos
    function actualiza_citaResuelta($id)
    {
        $sql = "update citas set ";
        $sql .= "id_estatus=2";
        $sql .= " where id_cita='" . $id . "'";
        //echo $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        if (mysqli_affected_rows($this->db_conn) == 1) {
            $actualizado = 1;
        } else {
            $actualizado = 0;
        }
        unset($obj);
        return $actualizado;
    }

    //Actualizar una cita en la base de datos
    function actualiza_citaPendiente($id)
    {
        $sql = "update citas set ";
        $sql .= "id_estatus=1";
        $sql .= " where id_cita='" . $id . "'";
        //echo $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        if (mysqli_affected_rows($this->db_conn) == 1) {
            $actualizado = 1;
        } else {
            $actualizado = 0;
        }
        unset($obj);
        return $actualizado;
    }

    //Verificar si existe una cita
     function existe_cita($id)
    {
        $id = $this->db_conn->real_escape_string($id);
        $sql = "select count(*) from citas";
        $sql .= " where id_cita='$id'";
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn, $this->db_query) or
            die(mysqli_error($this->db_conn));
        $renglon = mysqli_fetch_array($rs);
        $cuantos = $renglon[0];
        return $cuantos;
    }

    //Borrar un asunto de la base de datos
     function borra_cita($id)
    {
        $id = $this->db_conn->real_escape_string($id);
        $sql = "delete from citas where id_cita='$id'";
        $this->set_sql($sql);
        mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        if (mysqli_affected_rows($this->db_conn) == 1) {
            $borrado = 1;
        } else {
            $borrado = 0;
        }
        return $borrado;
    }

    function getNumeroDeTurnoDespuesDeInsercion() {
        $sql = "select numero_de_turno from citas ORDER BY id_cita DESC LIMIT 1;";
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $num = $row["numero_de_turno"];
            return $num;
        } else {
            // Manejar el error de la consulta
            return false;
        }
    }



} //END CLASS CITAS_DAL
?>