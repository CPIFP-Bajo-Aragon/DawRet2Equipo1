<?php
    class LoginModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function loginUsuario($datos){
            $this->db->query("SELECT * FROM PERSONA WHERE Nom_User = :Nom_User ");

            // $this->db->query("SELECT * FROM profesores WHERE login = :login AND password = sha2(:password,256)");
        
            $this->db->bind(':Nom_User', $datos['usuario']);
            // $this->db->bind(':password', $datos['password']);

    
            return $this->db->registro();

        }
}