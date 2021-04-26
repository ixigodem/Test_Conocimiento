<?php
    class Usuario {
        private $id_usuario;
        private $usuario;    
        private $clave;    
        private $nombres;    
        private $ap_paterno;    
        private $ap_materno;    
        private $email;    
        private $estado;
        private $id_perfil; 
    

        public function __construct(){
            // por defecto
        }

        public function setId_Usuario($id_usuario){
            $this->id_usuario = $id_usuario;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        public function setClave($clave){
            $this->clave = $clave;
        }
        public function setNombres($nombres){
            $this->nombres = $nombres;
        }
        public function setAp_Paterno($ap_paterno){
            $this->ap_paterno = $ap_paterno;
        }
        public function setAp_Materno($ap_materno){
            $this->ap_materno = $ap_materno;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }
        public function setId_Perfil($id_perfil){
            $this->id_perfil = $id_perfil;
        }

        public function getId_Usuario(){
            return $this->id_usuario;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function getClave(){
            return $this->clave;
        }
        public function getNombres(){
            return $this->nombres;
        }
        public function getAp_Paterno(){
            return $this->ap_paterno;
        }
        public function getAp_Materno(){
            return $this->ap_materno;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getEstado(){
            return $this->estado;
        }
        public function getId_Perfil(){
            return $this->id_perfil;
        }

    }

?>