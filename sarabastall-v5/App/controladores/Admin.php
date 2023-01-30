<?php
    class Admin extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);

            //$this->datos["usuarioSesion"] = $this->asesoriaModelo->getPersona(1);
            $this->cursoModelo = $this->modelo('CursoModelo');
            $this->centroModelo = $this->modelo('CentroModelo');

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
            
            $this->vista("gestion/prestamos",$this->datos);
        }

        public function gestionar_cursos(){
            
            $this->datos["CursosTotales"] = $this->cursoModelo->get_cursos();

            $this->vista("gestion/cursos",$this->datos);
        }

        public function gestionar_personas(){
            
            $this->vista("gestion/personas",$this->datos);
        }

        public function gestionar_becas(){
            
            $this->vista("gestion/becas",$this->datos);
        }

        public function gestionar_economia(){
            
            $this->vista("gestion/economia",$this->datos);
        }

    }

?>