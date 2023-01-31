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


        public function addPersona($error=0){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $persona = $_POST;
                 print_r($persona);
                if(!$_POST['nombrePersona'] && !$_POST['apellidosPersona'] && !$_POST['direccionPersona'] && !$_POST['fechaNacimientoPersona'] && !$_POST['telefonoPersona'] && !$_POST['emailPersona'] ){
                    redireccionar('/');
                }else{
                    echo "Se ha producido un error";
                }
                
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
    }

?>