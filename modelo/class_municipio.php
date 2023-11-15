<?php
if(class_exists('Municipio') != true){
    class Municipio {
        protected $id_municipio;
        protected $nombre_de_municipio;

        public function __construct($id_municipio = NULL, $nombre_de_municipio = NULL) {
            $this->id_municipio = $id_municipio;
            $this->nombre_de_municipio = $nombre_de_municipio;
        } //END CONSTRUCTOR

        //GETTERS & SETTERS 
        public function getIdMunicipio() {
            return $this->id_municipio;
        }

        public function setIdMunicipio($id_municipio) {
            $this->id_municipio = $id_municipio;
        }

        public function getNombreDeMunicipio() {
            return $this->nombre_de_municipio;
        }

        public function setNombreDeMunicipio($nombre_de_municipio) {
            $this->nombre_de_municipio = $nombre_de_municipio;
        }

    } //END CLASS MUNICIPIO
}//END IF
?>