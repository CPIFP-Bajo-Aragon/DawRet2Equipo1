<?php
    class EconomiaModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Economia

        public function get_movimientos(){
            $this->db->query("SELECT  Id_Movimiento, Procedencia, Fecha, ");

            return $this->db->registros();
        }

    }

?>