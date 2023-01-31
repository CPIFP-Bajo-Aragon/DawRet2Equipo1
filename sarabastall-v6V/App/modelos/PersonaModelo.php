<?php
    class PersonaModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Persona

        public function get_personas(){

            $this->db->query("SELECT pers.Id_Persona as Id_Persona, pers.Nombre as Nombre, pers.Apellidos as Apellidos,
            pers.Direccion as Direccion, pers.Fecha_Nacimiento as Fecha_Nacimiento, pers.Telefono as Telefono,
            pers.Email as Email, pers.Login as Login, pers.Password as Password, r.Nombre_Rol as Nombre_Rol
            FROM PERSONA pers, ROL r
            WHERE r.Id_Rol = pers.Id_Rol");

            return $this->db->registros();

        }
        // public function get_personas(){

        //     $this->db->query("SELECT *
        //     FROM PERSONA, ROL
        //     WHERE Id_Rol=Id_Rol");

        //     return $this->db->registros();

        // }

        public function add_Persona(){

            $this->db->query("INSERT INTO PERSONA (Nombre, Apellidos, Direccion, Fecha_Nacimiento, Telefono, Email, Login)
                VALUES (:nombre, :apellidos, :direccion, :fecha_nacimiento, :telefono, :email, :login)");

                $this->db->bind(':nombre',trim($datos['nombrePersona']));
                $this->db->bind(':apellidos',trim($datos['importe_input']));
                $this->db->bind(':direccion',trim($datos['direccionPersona']));
                $this->db->bind(':fecha_nacimiento',trim($datos['fechaNacimientoPersona']));
                $this->db->bind(':telefono',trim($datos['telefonoPersona']));
                $this->db->bind(':email',trim($datos['emailPersona']));
                $this->db->bind(':login',trim($datos['loginPersona']));

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

    }

?>