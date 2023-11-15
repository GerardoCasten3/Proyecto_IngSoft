<?php
if(class_exists('Nivel') != true){
    class Nivel{
        protected $id_nivel;
        protected $descripcion_nivel;

        public function __construct($id_nivel = NULL, $descripcion_nivel = NULL){
            $this -> id_nivel = $id_nivel;
            $this -> descripcion_nivel = $descripcion_nivel;
        }//END CONSTRUCTOR

        //GETTERS & SETTERS
        public function getId_nivel(){
            return $this -> id_nivel;
        }

        public function setId_nivel($id_nivel){
            $this -> id_nivel = $id_nivel;
        }

        public function getDescripcion_nivel(){
            return $this -> descripcion_nivel;
        }

        public function setDescripcion_nivel($descripcion_nivel){
            $this -> descripcion_nivel = $descripcion_nivel;
        }
    } //END CLASS NIVEL
} //END IF
?>