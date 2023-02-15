<?php
    class PedirConsultarPrestamo{
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

        public function get_prestamos_usuario($id){
            $this->db->query("SELECT p.Id_Prestamo, p.Concepto, p.Importe, est.Id_Estado, est.Nombre as NombreEst, p.Fecha_Inicio, pers.Nombre as NombrePers, tipo.Nombre as NombreTipo 
                                FROM PRESTAMO p, PERSONA pers, TIPO_PRESTAMO tipo, ESTADO est
                            WHERE pers.Id_Persona=p.Id_Persona AND tipo.Id_TipoPrestamo=p.Id_TipoPrestamo AND est.Id_Estado=p.Id_Estado AND :id=p.Id_Persona");

            $this->db->bind(':id',$id);

            return $this->db->registros();

        }

        public function addPrestamo($datos){
            $this->db->query("INSERT INTO PRESTAMO (Concepto, Importe, Observaciones, Fecha_Inicio, Id_Persona, Id_TipoPrestamo)
                VALUES (:concepto, :importe, :observaciones, :fecha_inicio, :Id_Persona, :Id_TipoPrestamo)");

                $this->db->bind(':concepto',trim($datos['concepto']));
                $this->db->bind(':importe',trim($datos['importe']));
                $this->db->bind(':observaciones',trim($datos['observaciones']));
                $this->db->bind(':fecha_inicio',trim($datos['fecha_inicio']));
                $this->db->bind(':Id_Persona',trim($datos['Id_Persona']));
                $this->db->bind(':Id_TipoPrestamo',trim($datos['Id_TipoPrestamo']));
                
               
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }

        public function addPrestamoNombre($datos,$id){
            $this->db->query("INSERT INTO PRESTAMO (Concepto, Importe, Observaciones, Fecha_Inicio, Id_Persona, Id_TipoPrestamo)
                VALUES (:concepto, :importe, :observaciones, :fecha_inicio, :Id_Persona, :Id_TipoPrestamo)");

                $this->db->bind(':concepto',trim($datos['concepto']));
                $this->db->bind(':importe',trim($datos['importe']));
                $this->db->bind(':observaciones',trim($datos['observaciones']));
                $this->db->bind(':fecha_inicio',trim($datos['fecha_inicio']));
                $this->db->bind(':Id_TipoPrestamo',trim($datos['Id_TipoPrestamo']));
                
                $this->db->bind(':Id_Persona',$id);

                print_r($id);

               
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

    }

?>