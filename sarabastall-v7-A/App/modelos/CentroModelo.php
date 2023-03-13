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


        public function del_centro($Id_Centro){
            $this->db->query("DELETE FROM CENTRO WHERE Id_Centro = :Id_Centro");

            $this->db->bind(':Id_Centro', $Id_Centro);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // public function addCentro($datos,$Id_Ciudad){

        //     // $this->db->query("INSERT INTO CIUDAD (Nombre_Ciudad, Distancia)
        //     //                             VALUES (:Nombre_Ciudad, :Distancia)");
            
        //     // $this->db->bind(':Nombre_Ciudad',trim($datos['Nombre_Ciudad']));
        //     // $this->db->bind(':Distancia',trim($datos['Distancia']));


        //     $this->db->query("INSERT INTO CENTRO (Nombre, Cuantia, Id_Ciudad)
        //                         VALUES (:Nombre, :Cuantia, :Id_Ciudad)");

        //     $this->db->bind(':Nombre',trim($datos['Nombre']));
        //     $this->db->bind(':Cuantia',trim($datos['Cuantia']));
        //     $this->db->bind(':Id_Ciudad', $Id_Ciudad);

        //     $Id_Centro = $this->db-> executeLastId();

        //     $this->db->execute();
            
        //     print_r($Id_Centro);

        //     exit();

        //     if($this->db->execute()){



        //         return true;
        //     }else{
        //         return false;
        //     }
            
        // }


        public function getCiudades(){
            $this->db->query("SELECT * FROM CIUDAD");

            return $this->db->registros();

        }

        public function getVisualizarCentro($Id_Centro){
            $this->db->query("SELECT * FROM CENTRO cen, CIUDAD ciu WHERE ciu.Id_Ciudad=cen.Id_Ciudad AND Id_Centro=:Id_Centro");

            $this->db->bind(':Id_Centro', $Id_Centro);

            return $this->db->registro();

        }

        public function editCentro($datos, $Id_Centro){

            $this->db->query("UPDATE CIUDAD SET Nombre_Ciudad=:Nombre_Ciudad, Distancia=:Distancia WHERE Id_Ciudad=:Id_Ciudad");

            $this->db->bind(':Nombre_Ciudad', $datos['Ciudad']);
            $this->db->bind(':Distancia', $datos['Distancia']);
            $this->db->bind(':Id_Ciudad', $datos['Id_Ciudad']);

            $this->db->execute();

            $this->db->query("UPDATE CENTRO SET Nombre=:Nombre, Cuantia=:Cuantia WHERE Id_Centro=:Id_Centro");

            $this->db->bind(':Nombre', $datos['Nombre']);
            $this->db->bind(':Cuantia', $datos['Cuantia']);
            $this->db->bind(':Id_Centro', $Id_Centro);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

    }

?>
