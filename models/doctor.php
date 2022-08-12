<?php

namespace Model;

class doctor extends ActiveRecord{
    //base de datos 
    protected static $tabla = 'doctores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'especialidad', 'direccion','telefono'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $especialidad;
    public $direccion;
    public $telefono;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->especialidad = $args['especialidad'] ?? '';
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
        if(!$this->especialidad){
            self::$alertas['error'] [] = 'La especialidad es Obligatoria';
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