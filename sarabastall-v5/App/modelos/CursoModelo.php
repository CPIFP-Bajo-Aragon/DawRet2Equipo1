<?php
    class CursoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        // EN FUNCIONAMIENTO
        public function get_Curso($id_curso){
            //Devuelve la informacion de un Curso concreto

            $this->db->query("SELECT Importe, e.Nombre as Especialidad, c.Id_Curso as Id, c.Nombre as Curso, p.Nombre as Profesor, c.Fecha_Impartir as Fecha FROM CURSO c, PERSONA p, ESPECIALIDAD e
            WHERE c.Id_Persona = p.Id_Persona AND c.Id_Especialidad = e.Id_Especialidad AND c.Id_Curso = :id
            ORDER BY c.Nombre DESC");

            $this->db->bind(':id', $id_curso);

            return $this->db->registro();
        }

        // EN FUNCIONAMIENTO
        public function get_Cursos(){
            // Devuelve toda la informacion de los cursos ha insertar en las tablas

            $this->db->query("SELECT c.Id_Curso as Id_Curso, e.Nombre as Especialidad, c.Nombre as Nombre, p.Nombre as Profesor, c.Fecha_Impartir as Fecha FROM CURSO c, PERSONA p, ESPECIALIDAD e
            WHERE c.Id_Persona = p.Id_Persona AND c.Id_Especialidad = e.Id_Especialidad
            ORDER BY c.Nombre DESC");

            return $this->db->registros();
        }

        // EN FUNCIONAMIENTO
        public function get_Cursos_Disponibles(){
            // Personalmente intentaria emular la funcionalidad de los Cursos como se hace en el moddle,
            // puesto que con la fecha deja mucho que desear, cuando empieza el curso, cuando acaba, dura un solo dia?

            $this->db->query("SELECT c.Id_Curso, c.Nombre, p.Nombre, c.Fecha_Impartir FROM CURSO c, PERSONA p
            WHERE c.Id_Persona = p.Id_Persona AND c.Fecha_Impartir > CURDATE()
            ORDER BY c.Nombre ASC");

            return $this->db->registros();
        }

        // EN FUNCIONAMIENTO
        public function add_Curso($datos){

            

            if($datos['importe']){ // Puede que haya que poner '||trim($datos['importe_input']) != null'
                // Utilizar el modelo Economia para introducir un nuevo movimiento

                $this->db->query("INSERT INTO MOVIMIENTO (Fecha, Procedencia, Cantidad, Id_TipoMov)
                VALUES (NOW(), :texto, :importe, 1)");

                $this->db->bind(':texto', "Costeo del Curso: ".trim($datos['nombre']));
                $this->db->bind(':importe',trim($datos['importe']));

                $this->db->execute();
                // Consulta o funcion para insertar nuevo movimiento (Si es funcion, devolvera el id del movimineto)
                $id_movimiento = $this->db->executeLastId();
                


                $this->db->query("INSERT INTO CURSO (Nombre, Importe, Fecha_Impartir, Id_Persona, Id_Especialidad, Id_Movimiento, Id_Estado)
                VALUES (:nombre, :importe, :fecha, :profesor, :especialidad, :movimiento, 3)");

                $this->db->bind(':nombre',trim($datos['nombre']));
                $this->db->bind(':importe',trim($datos['importe']));
                $this->db->bind(':fecha',trim($datos['fecha']));
                $this->db->bind(':especialidad',trim($datos['tipo']));
                $this->db->bind(':profesor',trim($datos['profesor']));
                $this->db->bind(':movimiento', $id_movimiento);

            } else {

                $this->db->query("INSERT INTO CURSO (Nombre, Importe, Fecha_Impartir, Id_Persona, Id_Especialidad, Id_Movimiento, Id_estado)
                VALUES (:nombre, null, :fecha, :profesor, :especialidad, null, 3)");

                $this->db->bind(':nombre',trim($datos['nombre']));
                $this->db->bind(':fecha',trim($datos['fecha']));
                $this->db->bind(':profesor',trim($datos['profesor']) );
                $this->db->bind(':especialidad',trim($datos['tipo']));

            }

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        // EN FUNCIONAMIENTO
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

        // EN FUNCIONAAMIENTO
        public function mod_Curso($curso, $id_curso){

            // Meditar si un curso creado puede ser modificado para añadir un importe o modificarlo

            $this->db->query("UPDATE CURSO SET Nombre=:nombre, Fecha_Impartir=:fecha, Id_Persona= :profesor, Id_Especialidad=:especialidad
            WHERE Id_Curso=:id_curso");

            $this->db->bind(':nombre', $curso['nombre']);
            $this->db->bind(':profesor', $curso['profesor']);
            $this->db->bind(':fecha', $curso['fecha']);
            $this->db->bind(':especialidad', $curso['tipo']);
            
            $this->db->bind(':id_curso', $id_curso);

            if($this->db->execute()){
            return true;
            }else{
            return false;
            }
        
        }

        // EN FUNCIONAMIENTO
        public function get_Material($id_curso){
            // Devuelve toda la informacion del Material asociado a un Curso

            $this->db->query("SELECT m.Id_Material as Id, m.Nombre as Nombre, Archivo FROM POSEER p, MATERIAL m
            WHERE p.Id_Material = m.Id_Material AND p.Id_Curso = :id");

            $this->db->bind(':id', $id_curso);

            return $this->db->registros();
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

        public function mod_Material($datos){
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

        // EN FUNCIONAMIENTO
        public function del_Material($id_curso, $id_material){
            // Cambiamos estado asesoria = 2 -Procesando-
            $this->db->query("DELETE FROM POSEER WHERE Id_Curso = :curso AND Id_Material = :material");

            $this->db->bind(':curso', $id_curso);
            $this->db->bind(':material', $id_material);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }

        // EN FUNCIONAMIENTO
        public function get_Especialidades(){
            // Devuelve toda la informacion del Material asociado a un Curso

            $this->db->query("SELECT Id_Especialidad as Id, Nombre FROM ESPECIALIDAD");

            return $this->db->registros();
        }

        // Funciones individuales por Especialidad??
        // Consultar


    }

?>