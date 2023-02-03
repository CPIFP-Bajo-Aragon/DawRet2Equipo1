<?php
    class PersonaModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Persona

        public function get_profesores(){
            $this->db->query("SELECT p.Id_Persona as Id, Nombre FROM PERSONA p, PROFESOR t
            WHERE p.Id_Persona = t.Id_Persona");

            return $this->db->registros();
        }


    }

?>