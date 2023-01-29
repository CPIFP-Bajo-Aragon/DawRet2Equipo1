<?php
    class CursoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function get_Curso($id_curso){
            //Devuelve la informacion de un Curso concreto

            $this->db->query("SELECT c.Id_Curso, c.Nombre, p.Nombre, c.Fecha_Impartir FROM CURSO c, PERSONA p
                                        WHERE c.id_curso=:id_curso AND c.Id_Persona = p.Id_Persona");

            $this->db->bind(':id_curso', $id_curso);

            return $this->db->registro();
        }

        public function get_Cursos(){
            // Devuelve toda la informacion de los cursos ha insertar en las tablas

            $this->db->query("SELECT c.Id_Curso, c.Nombre, p.Nombre, c.Fecha_Impartir FROM CURSO c, PERSONA p
            WHERE c.Id_Persona = p.Id_Persona
            ORDER BY c.Nombre DESC");

            return $this->db->registros();
        }

        public function get_Cursos_Disponibles(){
            // Personalmente intentaria emular la funcionalidad de los Cursos como se hace en el moddle,
            // puesto que con la fecha deja mucho que desear, cuando empieza el curso, cuando acaba, dura un solo dia?

            $this->db->query("SELECT c.Id_Curso, c.Nombre, p.Nombre, c.Fecha_Impartir FROM CURSO c, PERSONA p
            WHERE c.Id_Persona = p.Id_Persona AND c.Fecha_Impartir > CURDATE()
            ORDER BY c.Nombre DESC");

            return $this->db->registros();
        }

        public function add_Curso($datos, $id_profesor){

            $especialidad = 1; // Funcion que devuelve el id de la especialidad elegida

            if(trim($datos['importe_input']) != 0){ // Puede que haya que poner '||trim($datos['importe_input']) != null'
                // Utilizar el modelo Economia para introducir un nuevo movimiento


                // Consulta o funcion para insertar nuevo movimiento (Si es funcion, devolvera el id del movimineto)
                $id_movimiento = $this->db-> executeLastId();


                $this->db->query("INSERT INTO CURSO (Nombre, Importe, Fecha_Impartir, Id_Persona, Id_Especialidad, Id_Movimiento)
                VALUES (:nombre, :importe, :fecha, $id_profesor, $especialidad)");

                $this->db->bind(':nombre',trim($datos['nombre_input']));
                $this->db->bind(':importe',trim($datos['importe_input']));
                $this->db->bind(':fecha',trim($datos['fecha_input']));
                $this->db->bind(':especialidad',trim($datos['especialidad_input']));

            } else {

                $this->db->query("INSERT INTO CURSO (Nombre, Importe, Fecha_Impartir, Id_Persona, Id_Especialidad, Id_Movimiento)
                VALUES (:nombre, :importe, :fecha, :profesor, :especialidad, null)");

                $this->db->bind(':nombre',trim($datos['nombre_input']));
                $this->db->bind(':importe',trim($datos['importe_input']));
                $this->db->bind(':fecha',trim($datos['fecha_input']));
                $this->db->bind(':profesor', $id_profesor);
                $this->db->bind(':especialidad', $especialidad);

            }

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function del_Curso($id_curso){
            // Funcion para eliminar un curso
            
            $this->db->query("DELETE FROM CURSO WHERE Id_Curso = :id_curso");
            
            $this->db->bind(':id_curso', $id_curso);

            if($this->db->execute()){
                return true; // OBSERVACION; Puede que borrar un curso no sea buena idea si eso conlleva eliminar los movimientos asociados.
            }else{
                return false;
            }
        }

        public function mod_Curso(){

            $this->db->query("UPDATE CURSO SET nombre_as=:nombre_as, dni_as=:dni_as, titulo_as=:titulo_as, 
            telefono_as=:telefono_as, email_as=:email_as, domicilio_as=:domicilio_as, 
            descripcion_as=:descripcion_as
            WHERE id_asesoria=:id_asesoria");

            $this->db->bind(':nombre_as', $datos['nombre_as']);
            $this->db->bind(':dni_as', $datos['dni_as']);
            $this->db->bind(':titulo_as', $datos['titulo_as']);
            $this->db->bind(':telefono_as', $datos['telefono_as']);
            $this->db->bind(':email_as', $datos['email_as']);
            $this->db->bind(':domicilio_as', $datos['domicilio_as']);
            $this->db->bind(':descripcion_as', $datos['descripcion_as']);
            $this->db->bind(':id_asesoria', $id_asesoria);

            if($this->db->execute()){
            return true;
            }else{
            return false;
            }
        
        }


        public function add_Material($datos){
            // Cambiamos estado asesoria = 2 -Procesando-
            $this->db->query("UPDATE asesoria SET id_estado=2 WHERE id_asesoria=:id_asesoria");

            $this->db->bind(':id_asesoria', $datos['id_asesoria']);
            
            $this->db->execute();

            $this->db->query("INSERT INTO reg_acciones (fecha_reg, accion, automatica, id_asesoria, id_profesor)
                                        VALUES (NOW(), :accion, 0, :id_asesoria, :id_profesor)");
            
            $this->db->bind(':id_asesoria', $datos['id_asesoria']);
            $this->db->bind(':id_profesor', $datos['id_profesor']);
            $this->db->bind(':accion', $datos['accion']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }

        public function del_Material($datos){
            // Cambiamos estado asesoria = 2 -Procesando-
            $this->db->query("UPDATE asesoria SET id_estado=2 WHERE id_asesoria=:id_asesoria");

            $this->db->bind(':id_asesoria', $datos['id_asesoria']);
            
            $this->db->execute();

            $this->db->query("INSERT INTO reg_acciones (fecha_reg, accion, automatica, id_asesoria, id_profesor)
                                        VALUES (NOW(), :accion, 0, :id_asesoria, :id_profesor)");
            
            $this->db->bind(':id_asesoria', $datos['id_asesoria']);
            $this->db->bind(':id_profesor', $datos['id_profesor']);
            $this->db->bind(':accion', $datos['accion']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }

        // Funciones individuales por Especialidad??
        // Consultar


    }

?>