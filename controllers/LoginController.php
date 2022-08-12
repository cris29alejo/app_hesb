<?php

namespace Controllers;

use Classes\Email;
use Model\usuario;
use MVC\Router;

class LoginController{
    public static function login(Router $router){
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new usuario($_POST);
            $alertas = $auth->validarLogin();
            
            if(empty($alertas)){
                $usuario = usuario::where('email',$auth->email);

                if($usuario){
                    //Verificar el password
                    if($usuario->comprobarPasswordAndVerificado($auth->password)){
                        // Autenticar el usuario
                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre ." ".$usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        if($usuario->admin === "1"){
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin');
                        }else{
                            header('Location: /menu');
                        }
                    }
                    
                }else{
                    usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }

        }
        $alertas = usuario::getAlertas();
        $router->render('auth/login', [
        'alertas'=>$alertas
       ]);
    }
    public static function logout(Router $router){
        $router->render('auth/logout');
    }
    public static function olvide(Router $router){
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new usuario($_POST);
            $alertas = $auth->validarEmail();

            if(empty($alertas)){
                $usuario = usuario::where('email', $auth->email);

                if($usuario && $usuario->confirmado === "1"){
                    //Generar token temporal
                    $usuario->crearToken();
                    $usuario->guardar();

                    //TODO:Enviar el email
                    usuario::setAlerta('exito','Revisa tu correo electronico para cambiar de contraseña');
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();
                }else{
                    usuario::setAlerta('error', 'El usuario no existe o no esta confirmado');
                }
            }
        }
        $alertas = usuario::getAlertas();
        $router->render('auth/olvide-contraseña',[
            'alertas'=> $alertas            
        ]);
    }
    public static function recuperar(Router $router){
        $alertas = [];
        $error = false; 
        $token = s($_GET['token']); 

        $usuario = usuario::where('token',$token);

        //Buscar usuario por su token 

        if(empty($usuario)){
            usuario::setAlerta('error', 'Token no valido');
            $error = true;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Leer la nueva contraseña y guardarlo

            $contraseña = new usuario($_POST);
            $alertas = $contraseña->validarContraseña();

            if(empty($alertas)){
                $usuario->password = "null";

                $usuario->password = $contraseña->password;
                $usuario->hashPassword();
                $usuario->token = "null";

                $resultado = $usuario->guardar();

                if($resultado){
                    header('Location: /login');
                }
            }

        }
        $router->render('auth/recuperar',[
            'alertas'=> $alertas,
            'error'=> $error          
        ]);
    }
    public static function crear(Router $router){
        $usuario = new usuario();
        // Alertas Vacias
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            if(empty($alertas)){
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows){
                    $alertas = usuario::getAlertas();
                }else{  // NO esta registrado
                    // Hasear Contraseña
                    $usuario->hashPassword();
                    // Generar Token
                    $usuario->crearToken();

                    //Enivar email
                    $email = new Email($usuario->email,$usuario->nombre, $usuario->token);
                    
                    $email->enviarConfirmacion();
                    
                    //Crear el usuario
                    $resultado = $usuario->guardar();
                    if($resultado){
                        header('Location: /mensaje');
                    }
                }
            }

        }
        $router->render('auth/crear-cuenta',[
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
    public static function mensaje(Router $router){
        $alertas = [];

        $router->render('auth/mensaje',[
            'alertas'=>$alertas
        ]);
    }
    public static function confirmar(Router $router){
        $alertas = [];
        $token = s($_GET['token']);

        $usuario = usuario::where('token',$token);
        
        if(empty($usuario)){
            //mostrar mensaje de error
            usuario::setAlerta('error','Token no valido');
        }else{
            //modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = "null";
            $usuario->guardar();
            usuario::setAlerta('exito', 'Cuenta comprobada correctamente');
        }
        $alertas = usuario::getAlertas();
        $router->render('auth/confimar-cuenta',[
            'alertas'=> $alertas
        ]);
    }
}