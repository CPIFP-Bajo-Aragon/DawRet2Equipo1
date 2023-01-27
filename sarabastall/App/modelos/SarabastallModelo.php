<?php

    class SarabastallModelo{

        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function addCentro($datos){
            $this->db->query("INSERT INTO CENTRO (Id_Centro, Nombre, Cuantia, Id_Ciudad)
                                VALUES (:Id_Centro, :Nombre, :Cuantia, :Id_Ciudad)");

            $this->db->bind(':Id_Centro',trim($datos['Id_Centro']));
            $this->db->bind(':Nombre',trim($datos['Nombre']));
            $this->db->bind(':Cuantia',trim($datos['Cuantia']));
            $this->db->bind(':Id_Ciudad',trim($datos['Id_Ciudad']));

            $this->db->execute();
            // print_r($datos);

            exit();

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }



    }
?>