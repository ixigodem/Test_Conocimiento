<?php
    class Perfil {
        private $id_perfil;
        private $perfil;    
    

        public function __construct(){
            // por defecto
        }

        public function setId_Perfil($id_perfil){
            $this->id_perfil = $id_perfil;
        }
        public function setPerfil($perfil){
            $this->perfil = $perfil;
        }
        public function getId_perfil(){
            return $this->id_perfil;
        }

        public function getPerfil(){
            return $this->perfil;
        }

        
    }

?>