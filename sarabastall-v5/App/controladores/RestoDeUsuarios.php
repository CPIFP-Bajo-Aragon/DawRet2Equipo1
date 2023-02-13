<?php
    class Admin extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);

            //$this->datos["usuarioSesion"] = $this->asesoriaModelo->getPersona(1);
            $this->pedirConsultarPrestamo = $this->modelo('PedirConsultarPrestamo');


            $this->datos["rolesPermitidos"] = [1];

            if(!tienePrivilegios($this->datos["usuarioSesion"]->Id_Rol, $this->datos["rolesPermitidos"])){
                exit();
            }

        }
        
        public function index(){

            $this->vista("menu",$this->datos);

        }

        public function gestionar_economia(){

            // $this->datos["prestamos"] = $this->prestamoModelo->get_prestamos();

            $this->datos["PrestamosTotales"] = $this->pedirConsultarPrestamo->get_prestamos();

            $this->datos["tipoprestamo"] = $this->pedirConsultarPrestamo->gettipoPrestamo();

            $this->datos["nombrepersona"] = $this->prestamoModelo->getpersonaPrestamo();


            $this->vista("gestion/prestamos/pedirPrestamo",$this->datos);
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