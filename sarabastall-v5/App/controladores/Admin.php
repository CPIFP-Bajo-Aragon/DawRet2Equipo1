<?php
    class Admin extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);

            //$this->datos["usuarioSesion"] = $this->asesoriaModelo->getPersona(1);
            $this->cursoModelo = $this->modelo('CursoModelo');
            $this->centroModelo = $this->modelo('CentroModelo');
            $this->prestamoModelo = $this->modelo('PrestamoModelo');
            $this->becaModelo = $this->modelo('BecaModelo');
            $this->economiaModelo = $this->modelo('EconomiaModelo');
            $this->personaModelo = $this->modelo('PersonaModelo');

            $this->datos["rolesPermitidos"] = [1];

            if(!tienePrivilegios($this->datos["usuarioSesion"]->Id_Rol, $this->datos["rolesPermitidos"])){
                exit();
            }

        }
        
        public function index(){

            $this->vista("menu",$this->datos);

        }

        public function gestionar_centros(){

            $this->datos["centros"] = $this->centroModelo->get_centros();

            $this->vista("gestion/centros",$this->datos);
        }

        public function gestionar_prestamos(){

            $this->datos["PrestamosTotales"] = $this->prestamoModelo->get_prestamos();
            
            $this->vista("gestion/prestamos",$this->datos);
        }

        public function gestionar_cursos(){
            
            $this->datos["CursosTotales"] = $this->cursoModelo->get_cursos();

            $this->vista("gestion/cursos",$this->datos);
        }

        public function gestionar_personas(){

            $this->datos["PersonasTotales"] = $this->personaModelo->get_personas();
            
            $this->vista("gestion/personas",$this->datos);
        }

        public function gestionar_becas(){

            $this->datos["BecasTotales"] = $this->becaModelo->get_becas();
            
            $this->vista("gestion/becas",$this->datos);
        }

        public function gestionar_economia(){

            $this->datos["MovimientosTotales"] = $this->economiaModelo->get_movimientos();
            
            $this->vista("gestion/economia",$this->datos);
        }

        public function see_curso($id_curso){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $curso=$_POST;
    
                if($this->cursoModelo->mod_curso($curso, $id_curso)){
                    redireccionar("/admin/see_curso/$id_curso");
                } else{
                    echo "¡¡Se ha producido un error!!";
                }
    
            }else{
                $this->datos["curso"]=$this->cursoModelo->get_curso($id_curso);
                $this->datos["curso"]->material = $this->cursoModelo->get_material($id_curso);
    
                $this->vista("gestion/detalles_curso",$this->datos);
    
            }

        }

        public function del_curso(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_curso = $_POST["id_curso"];
                $id = $this->datos["usuarioSesion"]->Id_Rol;
    
                if($this->cursoModelo->del_Curso($id_curso, $id)){
                    redireccionar("/admin/gestionar_cursos");
                }else{
                    echo "Se ha producido un error";
                }
    
            }else{
    
            } 
        }

        public function add_curso(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $curso = $_POST;
    
                if($this->cursoModelo->add_Curso($curso)){
                    redireccionar("/admin/gestionar_cursos");
                }else{
                    echo "Se ha producido un error";
                }
    
            }else{
    
            } 

        }





    }

?>