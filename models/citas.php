<?php

namespace Model;

class citas extends ActiveRecord{
    //base de datos 
    protected static $tabla = 'citas';
    protected static $columna = 'precio';
    protected static $columnasDB = ['id', 'idpacientes', 'iddoctores', 'fecha', 'hora','precio'];
    
    public $id;
    public $idpacientes;
    public $iddoctores;
    public $fecha;
    public $hora;
    public $precio;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idpacientes = $args['idpacientes'] ?? '';
        $this->iddoctores = $args['iddoctores'] ?? '';
        $this->fecha = $args['fecha'] ?? null;
        $this->hora = $args['hora'] ?? null;
        $this->precio = $args['precio'] ?? null;

    }
    public function validar(){
        if(!$this->idpacientes){
            self::$alertas['error'] [] = 'El Paciente es Obligatorio';
        }
        if(!$this->iddoctores){
            self::$alertas['error'] [] = 'El Doctor es Obligatorio';
        }
        if(!$this->fecha){
            self::$alertas['error'] [] = 'La fecha es Obligatoria';
        }
        if(!$this->hora){
            self::$alertas['error'] [] = 'La hora es Obligatoria';
        }
        if(!$this->precio){
            self::$alertas['error'] [] = 'El precio es Obligatorio';
        }
        return self::$alertas;
    }
    public static function consultarCitas($columna, $valor){
        $query = "SELECT * FROM " . static::$tabla  ." WHERE ${columna} = '${valor}'";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
}