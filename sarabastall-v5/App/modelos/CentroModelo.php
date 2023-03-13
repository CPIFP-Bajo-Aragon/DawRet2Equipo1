<?php
    class CentroModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Centro

        public function get_centros(){

            $this->db->query("SELECT cen.Id_Centro as Id_Centro, cen.Nombre as Nombre, ciu.Nombre_Ciudad as Nombre_Ciudad, cen.Cuantia as Cuantia, ciu.Distancia as Distancia FROM CENTRO cen, CIUDAD ciu WHERE ciu.Id_Ciudad = cen.Id_Ciudad");

            return $this->db->registros();

        }

    }

?>