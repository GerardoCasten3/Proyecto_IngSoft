<?php
include('class_alumno.php');
include('class_db.php');

    class Alumno_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        function obtener_lista_Alumnos()
        {
            $sql="select * from alumnos";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            $total_alumnos=mysqli_num_rows($rs);
            $obj_det=null;
    
            if ($total_alumnos>0){
                $i=0;
                while ($renglon = mysqli_fetch_assoc($rs)){
                    $obj_det=new Alumno(
                        $renglon["curp"],
                        $renglon["nombre"],
                        $renglon["apellido_paterno"],
                        $renglon["apellido_materno"],
                        $renglon["telefono"],
                        $renglon["correo"],
                        $renglon["id_municipio"],                                            
                        $renglon["id_nivel"]
                        );
                    $i++;
                    $lista[$i]=$obj_det;
                    unset($obj_det);
                }//end while    
                    return $lista;
            }//end if    
        }//end function    


        //Insertar un alumno nuevo en la base de datos
        function inserta_alumno($obj)
    {
        $sql = "insert into alumno (";
        $sql .= "curp,";
        $sql .= "nombre,";
        $sql .= "apellido_paterno,";
        $sql .= "apellido_materno,";
        $sql .= "telefono,";
        $sql .= "correo,";
        $sql .= "id_municipio,";
        $sql .= "id_nivel";
        $sql .= ") ";
        $sql .= "values(";
        $sql .= "'" . $obj->getCurp() . "',";
        $sql .= "'" . $obj->getNombre() . "',";
        $sql .= "'" . $obj->getApellido_paterno() . "',";
        $sql .= "'" . $obj->getApellido_materno() . "',";
        $sql .= "'" . $obj->getTelefono() . "',";
        $sql .= "'" . $obj->getCorreo() . "',";
        $sql .= "'" . $obj->getId_municipio() . "',";
        $sql .= "'" . $obj->getId_nivel() . "'";
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
        
    
         //Actualizar un alumno en la base de datos
         function actualiza_alumno($obj){
			$sql="update alumnos set ";
			$sql.="nombre="."'".$obj->getNombre()."',";
            $sql.="apellido_paterno="."'".$obj->getApellido_paterno()."',";
            $sql.="apellido_materno="."'".$obj->getApellido_materno()."',";
            $sql.="telefono="."'".$obj->getTelefono()."',";
            $sql.="correo="."'".$obj->getCorreo()."',";
            $sql.="id_municipio="."'".$obj->getId_municipio()."',";
            $sql.="id_nivel="."'".$obj->getId_nivel()."'";
			$sql.=" where curp='".$obj->getCurp()."'";
			//echo $sql;exit;
			$this->set_sql($sql);
			$this->db_conn->set_charset("utf8");
			mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			if (mysqli_affected_rows($this->db_conn)==1){
				$actualizado=1;
			}
			else{
				$actualizado=0;
			}
			unset($obj);
			return $actualizado;			
		}

            //Borrar un alumno de la base de datos
    public function borra_alumno($curp)
    {
        $id = $this->db_conn->real_escape_string($curp);
        $sql = "delete from alumnos where curp='$curp'";
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