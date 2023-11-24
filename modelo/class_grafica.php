<?php
include('class_db.php');
class Grafica extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}

    function get_all_citas_estatus($id){
        $elsql="select e.descripcion_estatus AS estado, COUNT(*) AS cantidad FROM citas c JOIN estatus e ON c.id_estatus = e.id_estatus WHERE
        c.id_trabajador = '".$id."' GROUP BY e.descripcion_estatus;";

                $this->set_sql($elsql);
        
                $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
                $i=0;
                $data = array();
                while (($row = $rs->fetch_assoc()) !== null)
                    {
                        $data[] = array_map("utf8_encode",$row);
                        
                    }
                mysqli_free_result($rs);
                $this->close_db();
                return $data;
    }
}//end class
?>