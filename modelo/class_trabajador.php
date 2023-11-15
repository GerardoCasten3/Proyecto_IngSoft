<?php
if(class_exists('Trabajador') != true){
    class Trabajador{
        protected $id_trabajador;
        protected $nombre;
        protected $apellido_paterno;
        protected $apellido_materno;
        protected $puesto;

        public function __construct($id_trabajador = NULL, $nombre = NULL, $apellido_paterno = NULL, $apellido_materno = NULL, $puesto = NULL){
            $this -> id_trabajador = $id_trabajador;
            $this -> nombre = $nombre;
            $this -> apellido_paterno = $apellido_paterno;
            $this -> apellido_materno = $apellido_materno;
            $this -> puesto = $puesto;
        }//END CONSTRUCTOR

        //GETTERS & SETTERS
        public function getId_trabajador(){
            return $this -> id_trabajador;
        }

        public function setId_trabajador($id_trabajador){
            $this -> id_trabajador = $id_trabajador;
        }

        public function getNombre(){
            return $this -> nombre;
        }

        public function setNombre($nombre){
            $this -> nombre = $nombre;
        }

        public function getApellido_paterno(){
            return $this -> apellido_paterno;
        }

        public function setApellido_paterno($apellido_paterno){
            $this -> apellido_paterno = $apellido_paterno;
        }

        public function getApellido_materno(){
            return $this -> apellido_materno;
        }

        public function setApellido_materno($apellido_materno){
            $this -> apellido_materno = $apellido_materno;
        }

        public function getPuesto(){
            return $this -> puesto;
        }

        public function setPuesto($puesto){
            $this -> puesto = $puesto;
        }

    } //END CLASS TRABAJADOR
} //END IF
?>