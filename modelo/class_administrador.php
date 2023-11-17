<?php
if(class_exists('Administrador')!= true){
    class Administrador{
        protected $id_admin;
        protected $usuario;
        protected $contraseña;
        protected $id_trabajador;

        public function __construct($id_admin = NULL, $usuario = NULL, $contraseña = NULL, $id_trabajador = NULL){  
            $this -> id_admin = $id_admin;
            $this -> usuario = $usuario;
            $this -> contraseña = $contraseña;
            $this -> id_trabajador = $id_trabajador;
        }//END CONSTRUCTOR


        //GETTERS & SETTERS

        public function getId_admin(){
            return $this -> id_admin;
        }

        public function setId_admin($id_admin){
            $this -> id_admin = $id_admin;
        }

        public function getUsuario(){
            return $this -> usuario;
        }

        public function setUsuario($usuario){
            $this -> usuario = $usuario;
        }

        public function getContraseña(){
            return $this -> contraseña;
        }

        public function setContraseña($contraseña){
            $this -> contraseña = $contraseña;
        }

        public function getId_trabajador(){
            return $this -> id_trabajador;
        }

        public function setId_trabajador($id_trabajador){
            $this -> id_trabajador = $id_trabajador;
        }


    }//END CLASS ADMINISTRADOR
} //END IF
?>