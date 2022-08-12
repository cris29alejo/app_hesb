<?php

namespace Controllers;

use Model\doctor;
use MVC\Router;

class DoctorController{
    public static function index(Router $router){ 
        $doctores = doctor::all();
        
        $router->render('doctor/index',[
            'doctores'=>$doctores
        ]);
    }

    public static function crear(Router $router){ 
        $doctor = new doctor();
        // Alertas Vacias
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $doctor->sincronizar($_POST);
            $alertas = $doctor->validar();
            if(empty($alertas)){
            $resultado = $doctor->guardar();
            if($resultado){
                header('Location: /doctor');      
                }
            }
        }
        $alertas = doctor::getAlertas();
        $router->render('doctor/crear-doctor',[
            'doctor' => $doctor,
            'alertas' => $alertas
            ]);
    }
    public static function actualizar(Router $router){ 
        $id = validarOReedireccionar('/doctor/index');
        $alertas = doctor::getAlertas();
        $doctor = doctor::find($id);
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $doctor->sincronizar($_POST);
            $alertas = $doctor->validar();
            if(empty($alertas)){
            $resultado = $doctor->guardar();
            if($resultado){
                header('Location: /doctor');      
                }
            }
        }

        $router->render('doctor/actualizar-doctor',[
            'doctor'=>$doctor,
            'alertas'=>$alertas
        ]);
    }
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id,FILTER_VALIDATE_INT);

            if($id){
                $doctor = doctor::find($id);
                $doctor->eliminar();
            }
        }
        header('Location: /doctor');
    }
}