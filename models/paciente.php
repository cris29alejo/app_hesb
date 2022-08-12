<?php

namespace Model;

class paciente extends ActiveRecord{
    //base de datos 
    protected static $tabla = 'pacientes';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'genero', 'edad','cedula','fecha_nacimiento', 'direccion', 'telefono'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $genero;
    public $edad;
    public $cedula;
    public $fecha_nacimiento;
    public $direccion;
    public $telefono;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->edad = $args['edad'] ?? null;
        $this->cedula = $args['cedula'] ?? '';
        $this->fecha_nacimiento = $args['fecha_nacimiento'] ?? null;
        $this->direccion = $args['direccion'] ?? '';
        $this->telefono = $args['telefono'] ?? '';

    }
    public function validar(){
        if(!$this->nombre){
            self::$alertas['error'] [] = 'El nombre es Obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'] [] = 'El apellido es Obligatorio';
        }
        if(!$this->genero){
            self::$alertas['error'] [] = 'El genero es Obligatorio';
        }
        if(!$this->edad){
            self::$alertas['error'] [] = 'La edad es Obligatoria';
        }
        if(!$this->cedula){
            self::$alertas['error'] [] = 'La cedula es Obligatoria';
        }
        if(!$this->fecha_nacimiento){
            self::$alertas['error'] [] = 'La fecha de nacimiento es Obligatoria';
        }
        if(!$this->direccion){
            self::$alertas['error'] [] = 'La dirección es Obligatoria';
        }
        if(strlen($this->telefono) < 7){
            self::$alertas['error'] [] = 'El telefono debe ser mayor que 6 caracteres';
        }

        return self::$alertas;
    }
}