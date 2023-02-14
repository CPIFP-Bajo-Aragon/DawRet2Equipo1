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

            $this->datos["nombrepersona"] = $this->prestamoModelo->getpersonaPrestamo();

            $this->datos["tipoprestamo"] = $this->prestamoModelo->gettipoPrestamo();

            $this->datos["estado"] = $this->prestamoModelo->getestado();
            $this->datos["estados"] = $this->prestamoModelo->get_estados();
            
            $this->vista("gestion/prestamos",$this->datos);
        }

        public function gestionar_cursos(){


            //$this->datos["pageInfo"] = $_COOKIE["pageInfo"];
            $this->datos["CursosTotales"] = $this->cursoModelo->get_cursos();
            $this->datos["especialidades"] = $this->cursoModelo->get_especialidades();
            $this->datos["profesores"] = $this->personaModelo->get_profesores();

            $this->vista("gestion/cursos",$this->datos);
        }

        public function gestionar_personas(){

            $this->datos["PersonasTotales"] = $this->personaModelo->get_personas();
            $this->datos["roles"] = $this->personaModelo->get_roles();
            
            $this->vista("gestion/personas",$this->datos);
        }

        public function gestionar_becas(){

            $this->datos["BecasTotales"] = $this->becaModelo->get_becas();

            $this->datos["nombrealumno"] = $this->becaModelo->getalumnoBeca();

            $this->datos["tipos"] = $this->becaModelo->get_tipos();
            $this->datos["tipobeca"] = $this->becaModelo->getTipoBeca();

            $this->datos["centros"] = $this->becaModelo->getCentro();

            $this->vista("gestion/becas",$this->datos);
        }

        public function gestionar_economia(){
            
           $this->datos["MovimientosTotales"] = $this->economiaModelo->get_movimientos();
           $this->datos["tipoBeca"] = $this->economiaModelo->get_tipoBeca();
           $this->datos["tipos_movimiento"] = $this->economiaModelo->get_tipos_movimiento();
           $this->vista("gestion/economia",$this->datos);
        }

        //Gestion Economia
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



        //Gestión cursos
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
                $this->datos["especialidades"] = $this->cursoModelo->get_especialidades();
                $this->datos["profesores"] = $this->personaModelo->get_profesores();
    
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

        public function del_material($id_curso, $id_material){
            
            if($this->cursoModelo->del_Material($id_curso, $id_material)){
                redireccionar("/admin/see_curso/$id_curso");
            }else{
                echo "Se ha producido un error";
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

        // Gestion Centro

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

        public function see_Centro($Id_Centro){
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


        //Gestión Personas

        public function add_persona(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $persona = $_POST;
                //   print_r($persona);

                if(!$_POST['nombrePersona'] && !$_POST['apellidosPersona'] && !$_POST['direccionPersona'] && !$_POST['fechaNacimientoPersona'] && !$_POST['telefonoPersona'] && !$_POST['emailPersona'] ){
                    //  redireccionar('/admin/gestionar_personas');
                }else{   
                    if($this->personaModelo->addPersona($persona)){
                        redireccionar('/admin/gestionar_personas');
                    }else{
                        echo "Se ha producido un error";
                }

                }

            }else{
                $this->vista("/admin",$this->datos);
            }
                
        }


        public function del_persona(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_persona = $_POST["id_persona"];
    
                if($this->personaModelo->eliminarPersona($id_persona)){
                    redireccionar("/admin/gestionar_personas");
                }else{
                    echo "Se ha producido un error";
                }
    
            }else{
    
            } 
        }

        public function see_persona($id_persona){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $persona = $_POST;
                // print_r($persona);
                // exit();
    
                if($this->personaModelo->editPersona($persona, $id_persona)){
                    redireccionar("/admin/verPersona/$id_persona");
                }else {
                    echo "Se ha producido un error";
                }
                
            }else{
                $this->datos["persona"] = $this->personaModelo->getVisualizarPersona($id_persona);

                 //print_r($this->datos["persona"]);
                $this->vista("gestion/personas/editarPersona",$this->datos);
            }
    
    
        }

        // Gestion Becas

        public function add_beca(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $beca = $_POST;
                   print_r($beca);

                if(!$_POST['Importe'] && !$_POST['Fecha_Beca'] && !$_POST['Nota_Media']){
                    //  redireccionar('/admin/gestionar_personas');
                }else{   
                    if($this->becaModelo->addBeca($beca)){
                        redireccionar('/admin/gestionar_becas');
                    }else{
                        echo "Se ha producido un error";
                }

                }

            }else{
                $this->vista("/admin",$this->datos);
            }
                
        }

        // Gestion Prestamos

        public function add_prestamo(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $prestamo = $_POST;
                   print_r($prestamo);

                if(!$_POST['concepto'] && !$_POST['importe'] && !$_POST['estado'] && !$_POST['fecha_inicio'] && !$_POST['Id_Persona'] && !$_POST['Id_TipoPrestamo']){
                    //  redireccionar('/admin/gestionar_personas');
                }else{   
                    if($this->prestamoModelo->addPrestamo($prestamo)){
                        redireccionar('/admin/gestionar_prestamos');
                    }else{
                        echo "Se ha producido un error";
                }

                }

            }else{
                $this->vista("/admin",$this->datos);
            }
                
        }

        public function pedir_prestamo(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $prestamo = $_POST;
                   print_r($prestamo);

                if(!$_POST['concepto'] && !$_POST['importe'] && !$_POST['fecha_inicio'] && !$_POST['Id_Persona'] && !$_POST['Id_TipoPrestamo']){
                    //  redireccionar('/admin/gestionar_personas');
                }else{   
                    if($this->pedirConsultarPrestamo->addPrestamo($prestamo)){
                        redireccionar('/admin/gestionar_economia');
                    }else{
                        echo "Se ha producido un error";
                }

                }

            }else{
                $this->vista("/admin",$this->datos);
            }
                
        }

    }

?>