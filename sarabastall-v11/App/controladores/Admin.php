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
            $this->datos["ciudades"] = $this->centroModelo->get_ciudades();
            $this->vista("gestion/centros",$this->datos);
        }
        

        public function gestionar_prestamos(){

            $this->datos["PrestamosTotales"] = $this->prestamoModelo->get_prestamos();
            $this->vista("gestion/prestamos",$this->datos);
        }

        public function gestionar_cursos(){
            
            $this->datos["CursosTotales"] = $this->cursoModelo->get_cursos();
            $this->datos["especialidades"] = $this->cursoModelo->get_especialidades();
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
           $this->datos["movimientos"] = $this->economiaModelo->get_movimientos();
           $this->datos["tipoMov"] = $this->economiaModelo->get_tipoMov();
           $this->datos["tipoBeca"] = $this->economiaModelo->get_tipoBeca();
           $this->vista("gestion/economia",$this->datos);
         }




        //PARA LA GESTION DEL CENTRO
        public function del_centro(){  
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $Id_Centro = $_POST["Id_Centro"];

                if($this->centroModelo->del_centro($Id_Centro)){
                    redireccionar("/admin/gestionar_centros");
                }else{
                    echo "Se ha producido un error";
                }
            }   
        }

        public function verCentro($Id_Centro){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $centro=$_POST;

                if($this->centroModelo->editCentro($centro, $Id_Centro)){
                    redireccionar("/admin/verCentro/$Id_Centro");
                }else{
                    echo "¡Se ha producido un error!";
                }

            }else{
                $this->datos["centro"] = $this->centroModelo->getVisualizarCentro($Id_Centro);

                $this->vista("gestion/ver_centro", $this->datos);
            }
        }

        public function add_centro(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $centro = $_POST;
    
                if($this->centroModelo->add_centro($centro)){
                    redireccionar("/admin/gestionar_centros");
                }else{
                    echo "Se ha producido un error";
                }
    
            }else{
    
            } 

        }

        public function add_ciudad(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $ciudad = $_POST;
    
                if($this->centroModelo->add_ciudad($ciudad)){
                    redireccionar("/admin/gestionar_centros");
                }else{
                    echo "Se ha producido un error";
                }
    
            }else{
    
            } 

        }

        //PARA LA GESTION DE LOS MOVIMIENTOS
        public function add_movimiento(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $movimiento = $_POST;
    
                if($this->economiaModelo->add_movimiento($movimiento)){
                    redireccionar("/admin/gestionar_economia");
                }else{
                    echo "Se ha producido un error";
                }
    
            }else{
    
            } 

        }



        //PARA LA GESTION DE CURSOS
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