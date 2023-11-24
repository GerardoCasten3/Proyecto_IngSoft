<?php
include('class_nivel.php');
include('class_db.php');

class Nivel_dal extends class_db
{
    function __construct()
    {
        parent::__construct();
    }

    function __destruct()
    {
        parent::__destruct();
    }

    //Obtener datos de un nivel por id
    function datos_por_id($id)
    {
        $id = $this->db_conn->real_escape_string($id);
        $sql = "select * from nivel where id_nivel='$id'";
        $this->set_sql($sql);
        $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        $total_niveles = mysqli_num_rows($result);
        $obj_det = null;
        if ($total_niveles == 1) {
            $renglon = mysqli_fetch_assoc($result);
            $obj_det = new Nivel($renglon["id_nivel"], $renglon["descripcion_nivel"]);
        }
        return $obj_det;
    }

    //Datos por descripcion
    function datos_por_nombre($nombre)
    {
        $nombre = $this->db_conn->real_escape_string($nombre);
        $sql = "select * from nivel WHERE descripcion_nivel = '$nombre'";
        $this->set_sql($sql);
        $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        $total_niveles = mysqli_num_rows($result);
        $obj_det = null;
        if ($total_niveles == 1) {
            $renglon = mysqli_fetch_assoc($result);
            $obj_det = new Nivel($renglon["id_nivel"], $renglon["descripcion_nivel"]);
        }
        return $obj_det;
    }


    //Obtener listado de niveles
    function obtener_lista_niveles()
    {
        $sql = "select * from nivel";
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        $total_niveles = mysqli_num_rows($rs);
        $obj_det = null;
        if ($total_niveles > 0) {
            $i = 0;
            while ($renglon = mysqli_fetch_assoc($rs)) {
                $obj_det = new Nivel($renglon["id_nivel"], $renglon["descripcion_nivel"]);
                $i++;
                $lista[$i] = $obj_det;
                unset($obj_det);
            }
            return $lista;
        }
    }

    //Insertar un nivel nuevo en la base de datos
    function inserta_nivel($obj)
    {
        $sql = "insert into nivel(";
        $sql .= "descripcion_nivel)";
        $sql .= " values(";
        $sql .= "'" . $obj->getDescripcion_nivel() . "'";
        $sql .= ")";
        //echo $sql;exit;
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

    //Actualizar un nivel en la base de datos
    function actualiza_nivel($obj)
    {
        $sql = "update nivel set ";
        $sql .= "descripcion_nivel=" . "'" . $obj->getDescripcion_nivel() . "'";
        $sql .= " where id_nivel='" . $obj->getId_nivel() . "'";
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

    //Verificar si existe un nivel
    public function existe_nivel($id)
    {
        $id = $this->db_conn->real_escape_string($id);
        $sql = "select count(*) from nivel";
        $sql .= " where id_nivel='$id'";
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn, $this->db_query) or
            die(mysqli_error($this->db_conn));
        $renglon = mysqli_fetch_array($rs);
        $cuantos = $renglon[0];
        return $cuantos;
    }

    //Borrar un nivel de la base de datos
    public function borra_nivel($id)
    {
        $id = $this->db_conn->real_escape_string($id);
        $sql = "delete from nivel where id_nivel='$id'";
        $this->set_sql($sql);
        mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        if (mysqli_affected_rows($this->db_conn) == 1) {
            $borrado = 1;
        } else {
            $borrado = 0;
        }
        return $borrado;
    }

}

?>