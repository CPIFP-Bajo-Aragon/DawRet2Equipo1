<?php
    class PersonaModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Persona

        public function get_profesores(){
            $this->db->query("SELECT p.Id_Persona as Id, Nombre FROM PERSONA p, PROFESOR t
            WHERE p.Id_Persona = t.Id_Persona");

            return $this->db->registros();
        }

        public function get_personas(){

            $this->db->query("SELECT pers.Id_Persona as Id_Persona, pers.Nombre as Nombre, pers.Apellidos as Apellidos,
            pers.Direccion as Direccion, pers.Fecha_Nacimiento as Fecha_Nacimiento, pers.Telefono as Telefono,
            pers.Email as Email, pers.Login as Login, r.Nombre_Rol as Nombre_Rol
            FROM PERSONA pers, ROL r
            WHERE r.Id_Rol = pers.Id_Rol");

            return $this->db->registros();

        }

        public function addPersona($datos){
            $this->db->query("INSERT INTO PERSONA (Nombre, Apellidos, Direccion, Fecha_Nacimiento, Telefono, Email)
                VALUES (:nombrePersona, :apellidosPersona, :direccionPersona, :fechaNacimientoPersona, :telefonoPersona, :emailPersona)");

                $this->db->bind(':nombrePersona',trim($datos['nombrePersona']));
                $this->db->bind(':apellidosPersona',trim($datos['apellidosPersona']));
                $this->db->bind(':direccionPersona',trim($datos['direccionPersona']));
                $this->db->bind(':fechaNacimientoPersona',trim($datos['fechaNacimientoPersona']));
                $this->db->bind(':telefonoPersona',trim($datos['telefonoPersona']));
                $this->db->bind(':emailPersona',trim($datos['emailPersona']));
                // $this->db->bind(':loginPersona',trim($datos['loginPersona']));

               
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }

        public function eliminarPersona($id_persona){
            // Funcion para eliminar un curso
            
            $this->db->query("DELETE FROM PERSONA WHERE Id_Persona = :id_persona");
            
            $this->db->bind(':id_persona', $id_persona);

            if($this->db->execute()){
                return true; // OBSERVACION; Puede que borrar un curso no sea buena idea si eso conlleva eliminar los movimientos asociados.
            }else{
                return false;
            }
        }

        public function getVisualizarPersona($id_persona){
            $this->db->query("SELECT * FROM PERSONA
                                WHERE Id_Persona=:id_persona");


            $this->db->bind(':id_persona', $id_persona);
            

            return $this->db->registro();
        }

        public function editPersona($datos, $id_persona){ 

            $this->db->query("UPDATE PERSONA SET Nombre=:nombre_persona, Apellidos=:apellido_persona, Direccion=:direccion_persona, Fecha_Nacimiento=:fecha_nacimiento_persona,
                                                    telefono=:telefono_persona, Email=:email_persona, Login=:login_persona
                                WHERE Id_Persona=:id_persona");

            $this->db->bind(':nombre_persona', $datos['nombre_persona']);
            $this->db->bind(':apellido_persona', $datos['apellido_persona']);
            $this->db->bind(':direccion_persona', $datos['direccion_persona']);
            $this->db->bind(':fecha_nacimiento_persona', $datos['fecha_nacimiento_persona']);
            $this->db->bind(':telefono_persona', $datos['telefono_persona']);
            $this->db->bind(':email_persona', $datos['email_persona']);
            $this->db->bind(':login_persona', $datos['login_persona']);
            $this->db->bind(':id_persona', $id_persona);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

    }

?>