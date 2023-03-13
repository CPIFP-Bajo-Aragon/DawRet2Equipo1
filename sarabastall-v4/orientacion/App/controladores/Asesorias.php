<?php

class Asesorias extends Controlador{

    public function __construct(){
        //echo 'Inicio controlador cargado';

        Sesion::iniciarSesion($this->datos);



        $this->asesoriaModelo = $this->modelo('AsesoriaModelo');

        $this->asesoriaModelo = $this->modelo('AsesoriaModelo');


        $this->datos["usuarioSesion"]->roles = $this->asesoriaModelo->getRolesProfesor($this->datos["usuarioSesion"]->id_profesor);
        
        $this->datos["usuarioSesion"]->id_rol = obtenerRol($this->datos["usuarioSesion"]->roles);

        $this->datos["rolesPermitidos"] = [100, 200, 300];

        if(!tienePrivilegios($this->datos["usuarioSesion"]->id_rol, $this->datos["rolesPermitidos"])){
            echo "No tienes privilegios";
            exit();
        }
    }   
    

    
    public function index(){
        
        $this->vista("asesorias/index",$this->datos);
    }
    


    public function addAsesoria($error=0){

        $this->datos["rolesPermitidos"] = [200, 300];

        if(!tienePrivilegios($this->datos["usuarioSesion"]->id_rol, $this->datos["rolesPermitidos"])){
            echo "No tienes privilegios";
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $asesoria = $_POST;
            print_r($asesoria);
            if(!$_POST['nombre_as'] && !$_POST['dni_as'] && !$_POST['titulo_as'] && !$_POST['telefono_as'] && !$_POST['email_as'] && !$_POST['descripcion_as'] && !$_POST['domicilio_as']){
                redireccionar('/asesorias/add_asesoria/1');
            }else{
            if($this->asesoriaModelo->addAsesoria($asesoria, $this->datos["usuarioSesion"]->id_profesor)){
                redireccionar('/');
            }else{
                echo "Se ha producido un error";
            }
        }

            
        }else{
        $this->datos["menuActivo"] = "";
        $this->datos["error"] = $error;

        $this->vista("asesorias/nueva_asesoria",$this->datos);

        }
    }

    public function ver_asesoria($id_asesoria){

        $this->datos["rolesPermitidos"] = [200, 300];

        if(!tienePrivilegios($this->datos["usuarioSesion"]->id_rol, $this->datos["rolesPermitidos"])){
            echo "No tienes privilegios";
            exit();
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $asesoria=$_POST;

            if($this->asesoriaModelo->asesoriaCerrada($accion["id_asesoria"])){
                exit();
            }

            if($this->asesoriaModelo->editAsesoria($asesoria, $id_asesoria)){
                redireccionar("/asesorias/ver_asesoria/$id_asesoria");
            } else{
                echo "¡¡Se ha producido un error!!";
            }


        }else{
            $this->datos["asesoria"]=$this->asesoriaModelo->getAsesoria($id_asesoria);
            $this->datos["asesoria"]->acciones = $this->asesoriaModelo->getAccionesAsesoria($id_asesoria);
            // print_r($this->datos["asesoria"]);

            $this->vista("asesorias/ver_asesorias",$this->datos);


        }
    }

    public function add_accion(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $accion = $_POST;
            $accion['id_profesor'] = $this->datos["usuarioSesion"]->id_profesor;

            if($this->asesoriaModelo->asesoriaCerrada($accion["id_asesoria"])){
                exit();
            }

            print_r($accion);

            if($this->asesoriaModelo->addAccion($accion)){
                redireccionar("/asesorias/ver_asesoria/".$accion['id_asesoria']);
            }else{
                echo "Se ha producido un error";
            }

        }else{

        } 
    }

    public function cerrar_asesoria(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $accion = $_POST;
            $accion['id_profesor'] = $this->datos["usuarioSesion"]->id_profesor;

            // print_r($accion);

            if($this->asesoriaModelo->asesoriaCerrada($accion)){
                redireccionar("/asesorias/ver_asesoria/".$accion['id_asesoria']);
            }else{
                echo "Se ha producido un error";
            }

        }else{

        } 
    }

}