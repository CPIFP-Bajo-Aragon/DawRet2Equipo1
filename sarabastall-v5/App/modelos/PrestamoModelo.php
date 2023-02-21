<?php
    class PrestamoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Prestamo

        
        public function get_prestamos(){
            $this->db->query("SELECT p.Id_Prestamo, est.Nombre as NombreEst, tipo.Nombre as NombreTipo, pers.Nombre as NombrePers, p.Fecha_Inicio, p.Importe
                                FROM PRESTAMO p, PERSONA pers, TIPO_PRESTAMO tipo, ESTADO est
                            WHERE pers.Id_Persona=p.Id_Persona AND tipo.Id_TipoPrestamo=p.Id_TipoPrestamo AND est.Id_Estado=p.Id_Estado");

            return $this->db->registros();

        }

        public function addPrestamo($datos){


            $this->db->query("INSERT INTO MOVIMIENTO (Fecha, Procedencia, Cantidad, Id_TipoMov)
                VALUES (NOW(), :texto, :importe, 2)");

                $this->db->bind(':texto', "Prestamo Concedido a: #".trim($datos['Id_Persona']));
                $this->db->bind(':importe',trim($datos['importe']));

            $this->db->execute();
            // Consulta o funcion para insertar nuevo movimiento (Si es funcion, devolvera el id del movimineto)
            $id_movimiento = $this->db->executeLastId();


            $this->db->query("INSERT INTO PRESTAMO (Concepto, Importe, Observaciones, Fecha_Inicio, Id_Persona, Id_TipoPrestamo, Id_Movimiento, Id_Estado)
                VALUES (:concepto, :importe, :observaciones, NOW(), :Id_Persona, :Id_TipoPrestamo, :movimiento, :Id_Estado)");

                $this->db->bind(':concepto',trim($datos['concepto']));
                $this->db->bind(':importe',trim($datos['importe']));
                $this->db->bind(':observaciones',trim($datos['observaciones']));
                $this->db->bind(':Id_Persona',trim($datos['Id_Persona']));
                $this->db->bind(':movimiento',$id_movimiento);
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

            return $this->db->registro();
        }

        public function get_estados(){
            $this->db->query("SELECT Id_Estado as Id, Nombre as Nombre FROM ESTADO");

            return $this->db->registros();
        }

        public function aprobarEstado($id_prestamo){
            $this->db->query("UPDATE PRESTAMO SET Id_Estado='5' WHERE Id_Prestamo=:id_prestamoA");

            $this->db->bind(':id_prestamoA', $id_prestamo);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function rechazarEstado($id_prestamo){
            $this->db->query("UPDATE PRESTAMO SET Id_Estado='6' WHERE Id_Prestamo=:id_prestamo");

            $this->db->bind(':id_prestamo', $id_prestamo);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

    }

?>