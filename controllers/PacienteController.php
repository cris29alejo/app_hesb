<?php

namespace Controllers;

use Model\paciente;
use MVC\Router;

class PacienteController{
    public static function index(Router $router){ 
        $pacientes = paciente::all();
        
        $router->render('paciente/index',[
            'pacientes'=>$pacientes
        ]);
    }

    public static function crear(Router $router){ 
        $paciente = new paciente();
        // Alertas Vacias
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $paciente->sincronizar($_POST);
            $alertas = $paciente->validar();

            if(empty($alertas)){
            $resultado = $paciente->guardar();
            if($resultado){
                header('Location: /paciente');      
                }
            }
        }
        $alertas = paciente::getAlertas();
        $router->render('paciente/crear-paciente',[
            'paciente' => $paciente,
            'alertas' => $alertas
            ]);
    }
    public static function actualizar(Router $router){ 
        $id = validarOReedireccionar('/paciente/index');
        $alertas = paciente::getAlertas();
        $paciente = paciente::find($id);
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $paciente->sincronizar($_POST);
            $alertas = $paciente->validar();
            if(empty($alertas)){
            $resultado = $paciente->guardar();
            if($resultado){
                header('Location: /paciente');      
                }
            }
        }

        $router->render('paciente/actualizar-paciente',[
            'paciente'=>$paciente,
            'alertas'=>$alertas
        ]);
    }
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id,FILTER_VALIDATE_INT);

            if($id){
                $paciente = paciente::find($id);
                $paciente->eliminar();
            }
        }
        header('Location: /paciente');
    }
}
    