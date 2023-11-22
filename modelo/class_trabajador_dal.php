<?php
include ('class_trabajador.php');
include ('class_db.php');

    class Trabajador_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        //Obtener datos de un trabajador por id
        function datos_por_id($id){
			$id=$this->db_conn->real_escape_string($id);
			$sql="select * from trabajador where id_trabajador='$id'";
			$this->set_sql($sql);
			$result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			$total_trabajador=mysqli_num_rows($result);
			$obj_det=null;
			if ($total_trabajador==1){
				$renglon=mysqli_fetch_assoc($result);
				$obj_det= new Trabajador($renglon["id_trabajador"],$renglon["nombre"],$renglon["apellido_paterno"],$renglon["apellido_materno"],$renglon["puesto"]);
			}
				return $obj_det;
		}

            //Obtener listado de trabajadores
            function obtener_lista_trabajador(){
                $sql="select * from trabajador";
                $this->set_sql($sql);
                $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
                $total_trabajador=mysqli_num_rows($rs);
                $obj_det=null;
                if ($total_trabajador>0){
                    $i=0;
                    while ($renglon = mysqli_fetch_assoc($rs)) {
                        $obj_det= new Trabajador($renglon["id_trabajador"],$renglon["nombre"],$renglon["apellido_paterno"],$renglon["apellido_materno"],$renglon["puesto"]);
                        $i++;
                        $lista[$i]=$obj_det;
                        unset($obj_det);
                    }
                    return $lista;
                } 		
            }

            //Insertar un trabajador nuevo en la base de datos
        function inserta_trabajador($obj){
			$sql="insert into trabajador(";
			$sql.="nombre, apellido_paterno, apellido_materno, puesto)";
			$sql.=" values(";
			$sql.="'".$obj->getNombre()."',";
            $sql.="'".$obj->getApellido_paterno()."',";
            $sql.="'".$obj->getApellido_materno()."',";
            $sql.="'".$obj->getPuesto()."'";
			$sql.=")";
			//echo $sql;exit;
			$this->set_sql($sql);
			$this->db_conn->set_charset("utf8");
			mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			if (mysqli_affected_rows($this->db_conn)==1){
				$insertado=1;
			}
			else{
				$insertado=0;
			}
			unset($obj);
			return $insertado;
		}

           //Actualiza un trabajador en la base de datos
        function actualiza_trabajador($obj){
			$sql="update trabajador set ";
			$sql.="nombre="."'".$obj->getNombre()."',";
            $sql.="apellido_paterno="."'".$obj->getApellido_paterno()."',";
            $sql.="apellido_materno="."'".$obj->getApellido_materno()."',";
            $sql.="puesto="."'".$obj->getPuesto()."'";
			$sql.=" where id_trabajador='".$obj->getId_trabajador()."'";
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

            //Verificar si existe un trabajador
            public function existe_trabajador($id){
                $id=$this->db_conn->real_escape_string($id);
                $sql="select count(*) from trabajador";
                $sql.=" where id_trabajador='$id'";
                $this->set_sql($sql);
                $rs=mysqli_query($this->db_conn,$this->db_query) or 
                die(mysqli_error($this->db_conn));
                $renglon=mysqli_fetch_array($rs);
                $cuantos=$renglon[0];
                return $cuantos;
            }

            public function borra_trabajador($id){
                $id=$this->db_conn->real_escape_string($id);
                $sql="delete from municipio where id_trabajador='$id'";
                $this->set_sql($sql);
                mysqli_query($this->db_conn,$this->db_query) or die(mysqli_query($this->db_conn));
                if (mysqli_affected_rows($this->db_conn)==1){
                    $borrado=1;
                }
                else{
                    $borrado=0;
                }
                return $borrado;
            }



    } //END CLASS TRABAJADOR_DAL



?>