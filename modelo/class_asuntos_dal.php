<?php
include('class_asuntos.php');
include('class_db.php');

    class Asuntos_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        //Obtener datos de un asunto por id
        function datos_por_id($id){
			$id=$this->db_conn->real_escape_string($id);
			$sql="select * from asuntos where id='$id'";
			$this->set_sql($sql);
			$result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			$total_asuntos=mysqli_num_rows($result);
			$obj_det=null;
			if ($total_asuntos==1){
				$renglon=mysqli_fetch_assoc($result);
				$obj_det= new Asuntos($renglon["id_asunto"],$renglon["descripcion_asunto"]);
			}
				return $obj_det;
		}

         //Obtener listado de asuntos
         function obtener_lista_asuntos(){
			$sql="select * from asuntos";
			$this->set_sql($sql);
			$rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			$total_asuntos=mysqli_num_rows($rs);
			$obj_det=null;
			if ($total_asuntos>0){
				$i=0;
				while ($renglon = mysqli_fetch_assoc($rs)) {
					$obj_det= new Asuntos($renglon["id_asunto"],$renglon["descripcion_asunto"]);
					$i++;
					$lista[$i]=$obj_det;
					unset($obj_det);
				}
				return $lista;
			} 		
		}

         //Insertar un asunto nuevo en la base de datos
         function inserta_asuntos($obj){
			$sql="insert into asuntos(";
			$sql.="descripcion_asunto)";
			$sql.=" values(";
			$sql.="'".$obj->getDescripcion_asunto()."'";
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

         //Actualizar un asunto en la base de datos
         function actualiza_asuntos($obj){
			$sql="update asuntos set ";
			$sql.="descripcion_asunto="."'".$obj->getDescripcion_asunto()."'";
			$sql.=" where id_asunto='".$obj->getId_asunto()."'";
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

        //Verificar si existe un asunto
        public function existe_asunto($id){
			$id=$this->db_conn->real_escape_string($id);
			$sql="select count(*) from asuntos";
			$sql.=" where id_asunto='$id'";
			$this->set_sql($sql);
			$rs=mysqli_query($this->db_conn,$this->db_query) or 
			die(mysqli_error($this->db_conn));
			$renglon=mysqli_fetch_array($rs);
			$cuantos=$renglon[0];
			return $cuantos;
		}

        //Borrar un asunto de la base de datos
        public function borra_asuntos($id){
			$id=$this->db_conn->real_escape_string($id);
			$sql="delete from asuntos where id_asunto='$id'";
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


    }//END CLASS ASUNTOS_DAL

?>