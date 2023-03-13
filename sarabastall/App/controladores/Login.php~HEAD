<?php
    class Login extends Controlador{

        public function __construct(){

            $this->loginModelo = $this->modelo('LoginModelo');

        }
        
        public function index($error =''){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $this->datos['usuario'] = trim($_POST['usuario']);
                $this->datos['password'] = trim($_POST['pass']);

                $usuarioSesion = $this->loginModelo->loginUsuario($this->datos);

                if(isset($usuarioSesion) && !empty($usuarioSesion)){  //Si tiene datos el objeto devuelto entramos
                    
                    Sesion::crearSesion($usuarioSesion);

                    redireccionar("/menu/");

                } else{
                    redireccionar('/login/index/error_1');
                }



            }else{

                if(Sesion::sesionCreada()){  //si ya estamos logueados redireccionamos
                    redireccionar('/');

                }
                
               $this->datos['error'] = $error;

               $this->vista('login', $this->datos);
            }
        }


        public function logout(){
            Sesion::cerrarSesion();
            redireccionar('/');
        }

    }

?>