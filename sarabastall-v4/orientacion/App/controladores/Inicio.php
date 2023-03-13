<?php

class Inicio extends Controlador{

    public function __construct(){
        //echo 'Inicio controlador cargado';

        Sesion::iniciarSesion($this->datos);

        $this->datos["menuActivo"] = "home";

        $this->asesoriaModelo = $this->modelo('AsesoriaModelo');

        $this->datos["usuarioSesion"] = $this->asesoriaModelo->getProfesor(1);

        $this->datos["usuarioSesion"]->roles = $this->asesoriaModelo->getRolesProfesor($this->datos["usuarioSesion"]->id_profesor);
        
        $this->datos["usuarioSesion"]->id_rol = obtenerRol($this->datos["usuarioSesion"]->roles);

        $this->datos["rolesPermitidos"] = [100, 200, 300];

        if(!tienePrivilegios($this->datos["usuarioSesion"]->id_rol, $this->datos["rolesPermitidos"])){
            echo "No tienes privilegios";
            exit();
        }
        
    }   
    
    public function index(){
        $this->datos["asesoriasActivas"] = $this->asesoriaModelo->getAsesoriasActivas();

        foreach($this->datos["asesoriasActivas"] as $asesoria){
            $asesoria->acciones = $this->asesoriaModelo->getAccionesAsesoria($asesoria->id_asesoria);

        }

        // print_r($this->datos["asesoriasActivas"]);
        // exit;

        $this->vista("index",$this->datos);
    }  
}