<?php
    class Trabajador extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);

            //$this->datos["usuarioSesion"] = $this->asesoriaModelo->getPersona(1);
            $this->pedirConsultarPrestamo = $this->modelo('PedirConsultarPrestamo');
            $this->cursoModelo = $this->modelo('CursoModelo');


            $this->datos["rolesPermitidos"] = [2];

            if(!tienePrivilegios($this->datos["usuarioSesion"]->Id_Rol, $this->datos["rolesPermitidos"])){
                exit();
            }

        }
        
        public function index(){

            $this->vista("menuTrabajador",$this->datos);

        }

        public function solicitar_prestamo(){

            $this->datos["tipoprestamo"] = $this->pedirConsultarPrestamo->gettipoPrestamo();

            $this->datos["nombrepersona"] = $this->pedirConsultarPrestamo->getpersonaPrestamo();


            $this->vista("gestion/prestamos/pedirPrestamo",$this->datos);
        }

        public function ver_prestamos(){

            $id = $this->datos["usuarioSesion"]->Id_Persona;

            $this->datos["prestamos"] = $this->pedirConsultarPrestamo->get_prestamos_usuario($id);

            $this->vista("gestion/prestamos/consultarPrestamo",$this->datos);

        }

        public function ver_cursos(){
            
            $this->datos["CursosTotales"] = $this->cursoModelo->get_cursos();

            $this->vista("gestion/cursos",$this->datos);
        }


        public function pedir_prestamo(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $prestamo = $_POST;
                   print_r($prestamo);

                if(!$_POST['concepto'] && !$_POST['importe'] && !$_POST['fecha_inicio'] && !$_POST['Id_Persona'] && !$_POST['Id_TipoPrestamo']){
                    //  redireccionar('/admin/gestionar_personas');
                }else{   
                    if($this->pedirConsultarPrestamo->addPrestamoNombre($prestamo, $this->datos["usuarioSesion"]->Id_Persona)){
                        redireccionar('/trabajador/solicitar_prestamo');
                    }else{
                        echo "Se ha producido un error";
                    }

                }

            }else{
                $this->vista("/trabajador",$this->datos);
            }
                
        }

        public function apuntarse_curso($id_curso){

            if($this->cursoModelo->join_curso($id_curso, $this->datos["usuarioSesion"]->Id_Persona)){
                redireccionar('/trabajador/ver_cursos');
            }else{
                echo "Se ha producido un error";
            }

        }

        public function agrupar_cursos($orden, $id){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){

                switch ($orden){
                    case "aviable":
                        $data = $this->cursoModelo->get_Aviables();
                        break;
                    case "apuntado":
                        $data = $this->cursoModelo->get_Apuntado($id);
                        break;
                    case "completo":
                        $data = $this->cursoModelo->get_Realizados($id);
                        break;
                    default:
                        $data = $this->cursoModelo->get_Cursos();
                        break;
                }

                $this->vistaApi($data);
            }
        }     




    }

?>