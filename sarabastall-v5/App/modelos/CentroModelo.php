<?php
    class CentroModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Centro

        public function get_centros(){

            $this->db->query("SELECT cen.Id_Centro as Id_Centro, cen.Nombre as Nombre,  cen.Cuantia as Cuantia, ciu.Distancia as Distancia, ciu.Nombre_Ciudad as Nombre_Ciudad FROM CENTRO cen, CIUDAD ciu WHERE ciu.Id_Ciudad = cen.Id_Ciudad");

            return $this->db->registros();

        }

    }

?>