<?php
    class PrestamoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Prestamo

        public function get_prestamos(){
            $this->db->query("SELECT p.Id_Prestamo, p.Concepto, p.Importe, est.Id_Estado, est.Nombre as NombreEst, p.Fecha_Inicio, pers.Nombre as NombrePers, tipo.Nombre as NombreTipo 
                                FROM PRESTAMO p, PERSONA pers, TIPO_PRESTAMO tipo, ESTADO est
                            WHERE pers.Id_Persona=p.Id_Persona AND tipo.Id_TipoPrestamo=p.Id_TipoPrestamo AND est.Id_Estado=p.Id_Estado");

            return $this->db->registros();

        }

        public function addPrestamo($datos){
            $this->db->query("INSERT INTO PRESTAMO (Concepto, Importe, Observaciones, Fecha_Inicio, Id_Persona, Id_TipoPrestamo, Id_Estado)
                VALUES (:concepto, :importe, :observaciones, :fecha_inicio, :Id_Persona, :Id_TipoPrestamo, :Id_Estado)");

                $this->db->bind(':concepto',trim($datos['concepto']));
                $this->db->bind(':importe',trim($datos['importe']));
                $this->db->bind(':observaciones',trim($datos['observaciones']));
                $this->db->bind(':fecha_inicio',trim($datos['fecha_inicio']));
                $this->db->bind(':Id_Persona',trim($datos['Id_Persona']));
                $this->db->bind(':Id_TipoPrestamo',trim($datos['Id_TipoPrestamo']));
                $this->db->bind(':Id_Estado',trim($datos['Id_Estado']));
                
               
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }

        public function getpersonaPrestamo(){
            $this->db->query("SELECT p.Id_Persona as Id_Persona, p.Nombre as Nombre FROM PERSONA p");

            return $this->db->registros();
        }

        public function gettipoPrestamo(){
            $this->db->query("SELECT * FROM TIPO_PRESTAMO");

            return $this->db->registros();
        }

        public function getestado(){
            $this->db->query("SELECT * FROM ESTADO");

            return $this->db->registros();
        }

    }

?>