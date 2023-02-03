<?php
    class PrestamoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Prestamo

        public function get_prestamos(){
            $this->db->query("SELECT p.Id_Prestamo, p.Concepto, p.Importe, p.Estado, p.Fecha_Inicio, pers.Nombre as NombrePers, tipo.Nombre as NombreTipo 
                                FROM PRESTAMO p, PERSONA pers, TIPO_PRESTAMO tipo 
                            WHERE pers.Id_Persona=p.Id_Persona AND tipo.Id_TipoPrestamo=p.Id_TipoPrestamo");

            return $this->db->registros();

        }

    }

?>