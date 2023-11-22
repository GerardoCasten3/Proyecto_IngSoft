<?php
include ('class_municipio.php');
include ('class_db.php');

    class Municipio_dal extends class_db{      
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }
        

            //Obtener datos de un municipio por id
        function datos_por_id($id){
			$id=$this->db_conn->real_escape_string($id);
			$sql="select * from municipio where id_municipio='$id'";
			$this->set_sql($sql);
			$result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			$total_municipios=mysqli_num_rows($result);
			$obj_det=null;
			if ($total_municipios==1){
				$renglon=mysqli_fetch_assoc($result);
				$obj_det= new Municipio($renglon["id_municipio"],$renglon["nombre_de_municipio"]);
			}
				return $obj_det;
		}

            //Obtener listado de municipios
        function obtener_lista_municipio(){
			$sql="select * from municipio";
			$this->set_sql($sql);
			$rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			$total_municipios=mysqli_num_rows($rs);
			$obj_det=null;
			if ($total_municipios>0){
				$i=0;
				while ($renglon = mysqli_fetch_assoc($rs)) {
					$obj_det= new Municipio($renglon["id_municipio"],$renglon["nombre_de_municipio"]);
					$i++;
					$lista[$i]=$obj_det;
					unset($obj_det);
				}
				return $lista;
			} 		
		}

        //Insertar un municipio nuevo en la base de datos
        function inserta_municipio($obj){
			$sql="insert into municipio(";
			$sql.="nombre_de_municipio)";
			$sql.=" values(";
			$sql.="'".$obj->getNombredeMunicipio()."'";
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

        //Actualizar un municipio en la base de datos
        function actualiza_municipio($obj){
			$sql="update municipio set ";
			$sql.="nombre_de_municipio="."'".$obj->getNombredeMunicipio()."'";
			$sql.=" where id_municipio='".$obj->getIdMunicipio()."'";
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

        //Verificar si existe un municipio
        public function existe_municipio($id){
			$id=$this->db_conn->real_escape_string($id);
			$sql="select count(*) from municipio";
			$sql.=" where id_municipio='$id'";
			$this->set_sql($sql);
			$rs=mysqli_query($this->db_conn,$this->db_query) or 
			die(mysqli_error($this->db_conn));
			$renglon=mysqli_fetch_array($rs);
			$cuantos=$renglon[0];
			return $cuantos;
		}

		//Borrar un municipio de la base de datos
        public function borra_municipio($id){
			$id=$this->db_conn->real_escape_string($id);
			$sql="delete from municipio where id_municipio='$id'";
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

    }//END CLASS MUNICIPIO_DAL
?>