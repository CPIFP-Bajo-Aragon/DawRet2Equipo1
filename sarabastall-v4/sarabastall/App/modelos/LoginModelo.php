<?php
    class LoginModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function loginUsuario($datos){
            $this->db->query("SELECT * FROM PERSONA WHERE Nom_User = :Nom_User AND Password = sha2(:pass,256)");
        
            $this->db->bind(':Nom_User', $datos['usuario']);
            $this->db->bind(':pass', $datos['password']);

    
            return $this->db->registro();

        }
    }
?>