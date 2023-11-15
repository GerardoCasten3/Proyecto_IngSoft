<?php
if(class_exists('Citas')!= true){
    class Citas{
        protected $id_cita;
        protected $numero_de_turno;
        protected $fecha_hora;
        protected $curp;
        protected $id_trabajador;
        protected $id_municipio;
        protected $id_estatus;
        protected $id_asunto;

        public function __construct($id_cita = NULL, $numero_de_turno = NULL, $fecha_hora = NULL, $curp = NULL, $id_trabajador = null
         $id_municipio = NULL, $id_estatus = NULL, $id_asunto = NULL){
            $this -> id_cita = $id_cita;
            $this -> numero_de_turno = $numero_de_turno;
            $this -> fecha_hora = $fecha_hora;
            $this -> curp = $curp;
            $this -> id_trabajador = $id_trabajador;
            $this -> id_municipio = $id_municipio;
            $this -> id_estatus = $id_estatus;
            $this -> id_asunto = $id_asunto;
        }//END CONSTRUCTOR

        //GETTERS & SETTERS
        public function getId_cita(){
            return $this -> id_cita;
        }

        public function setId_cita($id_cita){
            $this -> id_cita = $id_cita;
        }

        public function getNumero_de_turno(){
            return $this -> numero_de_turno;
        }

        public function setNumero_de_turno($numero_de_turno){
            $this -> numero_de_turno = $numero_de_turno;
        }

        public function getFecha_hora(){
            return $this -> fecha_hora;
        }

        public function setFecha_hora($fecha_hora){
            $this -> fecha_hora = $fecha_hora;
        }

        public function getCurp(){
            return $this -> curp;
        }

        public function setCurp($curp){
            $this -> curp = $curp;
        }

        public function getId_trabajador(){
            return $this -> id_trabajador;
        }

        public function setId_trabajador($id_trabajador){
            $this -> id_trabajador = $id_trabajador;
        }   

        public function getId_municipio(){
            return $this -> id_municipio;
        }

        public function setId_municipio($id_municipio){
            $this -> id_municipio = $id_municipio;
        }

        public function getId_estatus(){
            return $this -> id_estatus;
        }

        public function setId_estatus($id_estatus){
            $this -> id_estatus = $id_estatus;
        }

        public function getId_asunto(){
            return $this -> id_asunto;
        }

        public function setId_asunto($id_asunto){
            $this -> id_asunto = $id_asunto;
        }
    } //END CLASS CITAS
} //END IF
?>