<?php
    class Defecto extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);

            //$this->datos["usuarioSesion"] = $this->asesoriaModelo->getPersona(1);
            $this->pedirConsultarPrestamo = $this->modelo('PedirConsultarPrestamo');

            $this->datos["rolesPermitidos"] = [3];

            if(!tienePrivilegios($this->datos["usuarioSesion"]->Id_Rol, $this->datos["rolesPermitidos"])){
                exit();
            }

        }
        
        public function index(){

            $this->vista("menuDefault",$this->datos);

        }

        public function solicitar_prestamo(){

            $this->datos["tipoprestamo"] = $this->pedirConsultarPrestamo->gettipoPrestamo();

            $this->datos["nombrepersona"] = $this->pedirConsultarPrestamo->getpersonaPrestamo();


            $this->vista("gestion/prestamos/pedirPrestamoDefault",$this->datos);
        }

        public function ver_prestamos(){

            $id = $this->datos["usuarioSesion"]->Id_Persona;


            $this->datos["prestamos"] = $this->pedirConsultarPrestamo->get_prestamos_usuario($id);

            $this->vista("gestion/prestamos/consultarPrestamo",$this->datos);

        }


        public function pedir_prestamo(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $prestamo = $_POST;
                   print_r($prestamo);

                if(!$_POST['concepto'] && !$_POST['importe'] && !$_POST['fecha_inicio'] && !$_POST['Id_Persona'] && !$_POST['Id_TipoPrestamo']){
                    //  redireccionar('/admin/gestionar_personas');
                }else{   
                    if($this->pedirConsultarPrestamo->addPrestamoNombre($prestamo, $this->datos["usuarioSesion"]->Id_Persona)){
                        redireccionar('/defecto/solicitar_prestamo');
                    }else{
                        echo "Se ha producido un error";
                }

                }

            }else{
                $this->vista("/defecto",$this->datos);
            }
                
        }
    }
?>