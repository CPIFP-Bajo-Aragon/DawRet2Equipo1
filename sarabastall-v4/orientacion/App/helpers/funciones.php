<?php

//Para redireccionar pagina
function redireccionar($pagina){
    header('location: '.RUTA_URL.$pagina);
}

function formatoFecha($fechaEspaña){
    return date("d/m/Y H:i:s", strtotime($fechaEspaña));
}

function obtenerRol($roles){
    $id_rol=0;
        foreach($roles as $rol){
            if($rol->id_departamento==1){
                if($rol->id_rol==30){
                    $id_rol=100;
                }
            }elseif($rol->id_departamento==2){
                if($rol->id_rol==20){
                    $id_rol=200;
                }
                if($rol->id_rol==10){
                    $id_rol=300;
                }
            }
        }
    return $id_rol;
}

function tienePrivilegios($rol, $permitidos){
    
    if(empty($permitidos) || in_array($rol, $permitidos)){
        return true;
    }
}


?>