<?php
    class Admin extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);

            //$this->datos["usuarioSesion"] = $this->asesoriaModelo->getPersona(1);
            $this->cursoModelo = $this->modelo('CursoModelo');
            $this->centroModelo = $this->modelo('CentroModelo');
            $this->prestamoModelo = $this->modelo('PrestamoModelo');
            $this->becaModelo = $this->modelo('BecaModelo');
            $this->prestamoModelo = $this->modelo('PrestamoModelo');
            $this->personaModelo = $this->modelo('PersonaModelo');
            $this->pedirConsultarPrestamo = $this->modelo('PedirConsultarPrestamo');




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

            $this->datos["nombrepersona"] = $this->prestamoModelo->getpersonaPrestamo();

            $this->datos["tipoprestamo"] = $this->prestamoModelo->gettipoPrestamo();

            $this->datos["estado"] = $this->prestamoModelo->getestado();
            
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

            $this->datos["nombrealumno"] = $this->becaModelo->getalumnoBeca();

            $this->datos["tipobeca"] = $this->becaModelo->getTipoBeca();

            $this->datos["centros"] = $this->becaModelo->getCentro();

            $this->vista("gestion/becas",$this->datos);
        }

        public function gestionar_economia(){

            // $this->datos["MovimientosTotales"] = $this->economiaModelo->get_movimientos();
            
            // $this->vista("gestion/economia",$this->datos);

            $this->datos["PrestamosTotales"] = $this->pedirConsultarPrestamo->get_prestamos();

            $this->datos["tipoprestamo"] = $this->pedirConsultarPrestamo->gettipoPrestamo();

            $this->datos["nombrepersona"] = $this->prestamoModelo->getpersonaPrestamo();


            $this->vista("gestion/prestamos/pedirPrestamo",$this->datos);
        }

        public function consultar_prestamos(){
            
            $this->datos["PrestamosTotales"] = $this->pedirConsultarPrestamo->get_prestamos();

            $this->vista("gestion/prestamos/consultarPrestamo",$this->datos);

        }


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


        public function eliminarPersona(){
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

        public function verPersona($id_persona){
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


        //Becas
        // public function verBeca($id_beca){
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //         $beca = $_POST;
        //         // print_r($beca);
        //         // exit();
    
        //         if($this->becaModelo->editPersona($beca, $id_beca)){
        //             // redireccionar("/admin/verPersona/$id_beca");
        //         }else {
        //             echo "Se ha producido un error";
        //         }
                
        //     }else{
        //         $this->datos["beca"] = $this->becaModelo->getVisualizarBeca($id_beca);

        //          //print_r($this->datos["persona"]);
        //         // $this->vista("gestion/personas/editarBeca",$this->datos);
        //     }
    
    
        // }

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

        public function aprobarEstado(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_prestamo = $_POST["id_prestamoA"];
    
                if($this->prestamoModelo->aprobarEstado($id_prestamo)){
                    redireccionar("/admin/gestionar_prestamos");
                }else{
                    echo "Se ha producido un error";
                }
    
            }else{
    
            } 
        }


        public function rechazarEstado(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_prestamo = $_POST["id_prestamo"];
    
                if($this->prestamoModelo->rechazarEstado($id_prestamo)){
                    redireccionar("/admin/gestionar_prestamos");
                }else{
                    echo "Se ha producido un error";
                }
    
            }else{
    
            } 
        }
    }

?>