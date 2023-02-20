<?php
    class Master extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);

            //$this->datos["usuarioSesion"] = $this->asesoriaModelo->getPersona(1);

            $this->prestamoModelo = $this->modelo('PrestamoModelo');
            $this->personaModelo = $this->modelo('PersonaModelo');
            // $this->pedirConsultarPrestamo = $this->modelo('PedirConsultarPrestamo');

            $this->datos["rolesPermitidos"] = [4];

            if(!tienePrivilegios($this->datos["usuarioSesion"]->Id_Rol, $this->datos["rolesPermitidos"])){
                exit();
            }

        }
        
        public function index(){

            $this->vista("menuMaster",$this->datos);

        }

        public function gestionar_prestamo(){

            $this->datos["PrestamosTotales"] = $this->prestamoModelo->get_prestamos();
            $this->vista("gestion/prestamos",$this->datos);
        }

        public function gestionar_persona(){

            $this->datos["PersonasTotales"] = $this->personaModelo->get_personas();
            $this->vista("gestion/personas",$this->datos);
        }

        public function solicitar_prestamo(){

            $this->datos["tipoprestamo"] = $this->pedirConsultarPrestamo->gettipoPrestamo();

            $this->datos["nombrepersona"] = $this->pedirConsultarPrestamo->getpersonaPrestamo();


            $this->vista("gestion/prestamo/pedirPrestamoMaster",$this->datos);
        }

        public function ver_prestamos(){

            $this->datos["PrestamosTotales"] = $this->pedirConsultarPrestamo->get_prestamos();

            $this->vista("gestion/prestamo/consultarPrestamo",$this->datos);

        }

        //RELACIONADO CON PERSONA

        public function add_persona(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $persona = $_POST;
                //   print_r($persona);

                if(!$_POST['nombrePersona'] && !$_POST['apellidosPersona'] && !$_POST['direccionPersona'] && !$_POST['fechaNacimientoPersona'] && !$_POST['telefonoPersona'] && !$_POST['emailPersona'] ){
                    //  redireccionar('/master/gestionar_personas');
                }else{   
                    if($this->personaModelo->addPersona($persona)){
                        redireccionar('/master/gestionar_personas');
                    }else{
                        echo "Se ha producido un error";
                }

                }

            }else{
                $this->vista("/master",$this->datos);
            }
                
        }


        public function eliminarPersona(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_persona = $_POST["id_persona"];
    
                if($this->personaModelo->eliminarPersona($id_persona)){
                    redireccionar("/master/gestionar_personas");
                }else{
                    echo "Se ha producido un error";
                }
    
            }else{
    
            } 
        }

        public function verPersona($id_persona){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $persona = $_POST;
    
                if($this->personaModelo->editPersona($persona, $id_persona)){
                    redireccionar("/master/verPersona/$id_persona");
                }else {
                    echo "Se ha producido un error";
                }
                
            }else{
                $this->datos["persona"] = $this->personaModelo->getVisualizarPersona($id_persona);
                $this->vista("gestion/personas/editarPersonaMaster",$this->datos);
            }
        }

        //REALCIONADO CON PRESTAMOS

        public function pedir_prestamo(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $prestamo = $_POST;

                if(!$_POST['concepto'] && !$_POST['importe'] && !$_POST['fecha_inicio'] && !$_POST['Id_Persona'] && !$_POST['Id_TipoPrestamo']){
                     redireccionar('/master/gestionar_personas');
                }else{   
                    if($this->pedirConsultarPrestamo->addPrestamo($prestamo)){
                        redireccionar('/master/solicitar_prestamo');
                    }else{
                        echo "Se ha producido un error";
                    }
                }
            }else{
                $this->vista("/master",$this->datos);
            }
                
        }





    }
?>