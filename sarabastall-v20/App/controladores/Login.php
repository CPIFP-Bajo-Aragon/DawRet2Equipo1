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

                    switch ($_SESSION['usuarioSesion']->Id_Rol){
                        case 1:
                            print_r("administrador");
                            redireccionar("/admin");
                            break;
                        case 2:
                            print_r("Otro Rol N 1");
                            redireccionar("/el controlador del rol 1");
                            break;
                        case 3:
                            print_r("Otro Rol N 2");
                            redireccionar("/el controlador del rol 2");
                            break;
                        case 4:
                            print_r("Otro Rol N 3");
                            redireccionar("/master");
                            break;
                    }

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