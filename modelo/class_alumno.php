<?php
if(class_exists('Alumno') != true){
    class Alumno{
        protected $curp;
        protected $nombre;
        protected $apellido_paterno;
        protected $apellido_materno;
        protected $telefono;
        protected $correo;
        protected $id_municipio;
        protected $id_nivel;

        public function __construct($curp = NULL, $nombre = NULL, $apellido_paterno = NULL, $apellido_materno = NULL,
         $telefono = NULL, $correo = NULL, $id_municipio = NULL, $id_nivel = NULL){
            $this -> curp = $curp;
            $this -> nombre = $nombre;
            $this -> apellido_paterno = $apellido_paterno;
            $this -> apellido_materno = $apellido_materno;
            $this -> telefono = $telefono;
            $this -> correo = $correo;
            $this -> id_municipio = $id_municipio;
            $this -> id_nivel = $id_nivel;
        }//END CONSTRUCTOR


        //GETTERS & SETTERS
        public function getCurp(){
            return $this -> curp;
        }

        public function setCurp($curp){
            $this -> curp = $curp;
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

        public function getTelefono(){
            return $this -> telefono;
        }

        public function setTelefono($telefono){
            $this -> telefono = $telefono;
        }

        public function getCorreo(){
            return $this -> correo;
        }

        public function setCorreo($correo){
            $this -> correo = $correo;
        }

        public function getId_municipio(){
            return $this -> id_municipio;
        }

        public function setId_municipio($id_municipio){
            $this -> id_municipio = $id_municipio;
        }

        public function getId_nivel(){
            return $this -> id_nivel;
        }

        public function setId_nivel($id_nivel){
            $this -> id_nivel = $id_nivel;
        }

    }//END CLASS ALUMNO
}//END IF
?>