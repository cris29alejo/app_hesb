<?php

namespace Model;

class usuario extends ActiveRecord{
    //base de datos 
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password','telefono', 'admin', 'confirmado', 'token'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $admin;
    public $password;
    public $confirmado;
    public $token;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';

    }
    public function validarNuevaCuenta(){
        if(!$this->nombre){
            self::$alertas['error'] [] = 'El nombre es Obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'] [] = 'El apellido es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'] [] = 'El correo electrónico es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'] [] = 'La contraseña es Obligatoria';
        }
        if(strlen($this->telefono) < 7){
            self::$alertas['error'] [] = 'El telefono debe ser mayor que 6 caracteres';
        }

        return self::$alertas;
    }
    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'] [] = 'El correo electrónico es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'] [] = 'La contraseña es Obligatoria';
        }
        return self::$alertas;
    }
    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'] [] = 'El correo electrónico es Obligatorio';
        }
        return self::$alertas;
    }
    public function validarContraseña(){
        if(!$this->password){
            self::$alertas['error'] [] = 'La contraseña es Obligatoria';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'] [] = 'La contraseña debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }
    public function existeUsuario(){
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email. "' LIMIT 1";
        
        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }
        return $resultado;
    }
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function crearToken(){
        $this->token = uniqid(); 
    }
    public function comprobarPasswordAndVerificado($password){
        $resultado = password_verify($password,$this->password);

        if(!$resultado || !$this->confirmado){
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        }else{
            return true;
        }
    }
}