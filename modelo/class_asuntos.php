<?php
if(class_exists('Asuntos')!= true){
    class Asuntos{
        protected $id_asunto;
        protected $descripcion_asunto;

        public function __construct($id_asunto = NULL, $descripcion_asunto = NULL){
            $this -> id_asunto = $id_asunto;
            $this -> descripcion_asunto = $descripcion_asunto;
        }//END CONSTRUCTOR


        //GETTERS & SETTERS
        public function getId_asunto(){
            return $this -> id_asunto;
        }

        public function setId_asunto($id_asunto){
            $this -> id_asunto = $id_asunto;
        }

        public function getDescripcion_asunto(){
            return $this -> descripcion_asunto;
        }

        public function setDescripcion_asunto($descripcion_asunto){
            $this -> descripcion_asunto = $descripcion_asunto;
        }

    }//END CLASS ASUNTOS
} //END IF
?>