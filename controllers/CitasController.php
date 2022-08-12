<?php

namespace Controllers;

use Model\citas;
use Model\doctor;
use Model\paciente;
use MVC\Router;

class CitasController{
    public static function index(Router $router){ 
        $citas = [];
        $doctores = [];
        $pacientes = [];
        if(isset($_GET['fecha'])){
            $fecha = s($_GET['fecha']);
        }

        if(isset($fecha)){
            $citas = citas::consultarCitas('fecha',$fecha);
            $doctores = doctor::all();
            $pacientes = paciente::all();
        }
        $router->render('citas/index',[
            'citas' => $citas,
            'doctores' => $doctores,
            'pacientes' => $pacientes
        ]);
    }
    public static function crear(Router $router){ 
        $doctores = doctor::all();
        $pacientes = paciente::all();

        $cita = new citas();
        // Alertas Vacias
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cita->sincronizar($_POST);
            $alertas = $cita->validar();
            if(empty($alertas)){
            $resultado = $cita->guardar();
            if($resultado){
                header('Location: /citas');      
                }
            }
        }
        $alertas = doctor::getAlertas();
        $router->render('citas/crear-cita',[
            'doctores'=>$doctores,
            'pacientes'=>$pacientes,
            'alertas' => $alertas,
            'cita' => $cita
        ]);
    }
    public static function actualizar(Router $router){ 
        $doctores = [];
        $pacientes = [];
        $doctores = doctor::all();
        $pacientes = paciente::all();
        $id = validarOReedireccionar('/citas/index');
        $alertas = citas::getAlertas();
        $cita = citas::find($id);
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cita->sincronizar($_POST);
            $alertas = $cita->validar();
            if(empty($alertas)){
            $resultado = $cita->guardar();
            if($resultado){
                header('Location: /citas');      
                }
            }
        }

        $router->render('citas/actualizar-citas',[
            'cita'=>$cita,
            'alertas'=>$alertas,
            'pacientes'=>$pacientes,
            'doctores'=>$doctores
        ]);
    }
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id,FILTER_VALIDATE_INT);

            if($id){
                $cita = citas::find($id);
                $cita->eliminar();
            }
        }
        header('Location: /citas');
    }
}