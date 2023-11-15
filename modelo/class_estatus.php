<?php
if(class_exists('Estatus') != true){
    class Estatus {
        protected $id_estatus;
        protected $descripcion_estatus;

        public function __construct($id_estatus = NULL, $descripcion_estatus = NULL) {
            $this->id_estatus = $id_estatus;
            $this->descripcion_estatus = $descripcion_estatus;
        } //END CONSTRUCTOR

        //GETTERS & SETTERS
        public function getIdEstatus() {
            return $this->id_estatus;
        }

        public function setIdEstatus($id_estatus) {
            $this->id_estatus = $id_estatus;
        }

        public function getDescripcionEstatus() {
            return $this->descripcion_estatus;
        }

        public function setDescripcionEstatus($descripcion_estatus) {
            $this->descripcion_estatus = $descripcion_estatus;
        }
    } //END CLASS ESTATUS
} //END IF
?>