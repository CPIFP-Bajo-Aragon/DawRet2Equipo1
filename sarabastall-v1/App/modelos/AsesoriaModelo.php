<?php
    class AsesoriaModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function addAsesoria($datos){
            
            $this->db->query("INSERT INTO asesoria(nombre_as, dni_as, titulo_as, telefono_as, email_as, descripcion_as, domicilio_as, fecha_inicio, id_estado) VALUES (:nombre_as, :dni_as, :titulo_as, :telefono_as, :email_as, :descripcion_as, :domicilio_as, NOW(), 1)");

            $this->db->bind(':nombre_as', trim($datos['nombreF']));
            $this->db->bind(':dni_as', trim($datos['dniF']));
            $this->db->bind(':titulo_as', trim($datos['titulo']));
            $this->db->bind(':telefono_as', trim($datos['tlfn']));
            $this->db->bind(':email_as', trim($datos['email']));
            $this->db->bind(':descripcion_as', trim($datos['descF']));
            $this->db->bind(':domicilio_as', trim($datos['domi']));

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function getAccionesAsesoria($id_asesoria){
            
            // $this->db->query("SELECT * FROM asesoria a, estados e 
            //                             WHERE a.id_estado = e.id_estado AND a.id_asesoria = :id_asesoria");

            // $this->db->bind(':id_asesoria', $id_asesoria);

            // return $this->db->registro();
        }


        public function getAsesoria($id_asesoria){
            
            $this->db->query("SELECT * FROM asesoria a, estados e 
                                        WHERE a.id_estado = e.id_estado AND a.id_asesoria = :id_asesoria");

            $this->db->bind(':id_asesoria', $id_asesoria);

            return $this->db->registro();
        }

        public function listarAsesorias(){
            
            $this->db->query("SELECT * FROM asesoria a, estados e 
                                        WHERE a.id_estado = e.id_estado AND (a.id_estado = 1 OR a.id_estado = 2) 
                                        ORDER BY fecha_inicio DESC");

            return $this->db->registros();
        }

        public function getPersona($id){
            
            $this->db->query("SELECT * FROM PERSONA 
                                        WHERE Id_Persona = :id_persona");

            $this->db->bind(':id_persona', $id);
            return $this->db->registro();
        }

        public function getRoles($id_profesor){
            
            $this->db->query("SELECT r.id_rol, r.rol, p.id_departamento FROM profesores_departamento p , rol r 
                                                    WHERE p.rol_id_rol = r.id_rol AND p.id_profesor = :id_profesor");
            $this->db->bind(':id_profesor', $id_profesor);

            return $this->db->registros();
        }



        /*
        public function obtenerAtletas(){
            $this->db->query("SELECT * from atletas");
            return $this->db->registros();
        }*/

    }

?>