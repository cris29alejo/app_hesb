<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\CitasController;
use Controllers\DoctorController;
use Controllers\indexController;
use Controllers\LoginController;
use Controllers\MenuController;
use Controllers\PacienteController;
use MVC\Router;

$router = new Router();

//Inicio del app
$router->get('/', [indexController::class, 'index']);

//Iniciar Sesion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

//Recuperar password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

//Crear cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

//Confirmar Cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

//Citas
$router->get('/citas', [CitasController::class, 'index']);

//Citas/crear
$router->get('/crear-cita', [CitasController::class, 'crear']);
$router->post('/crear-cita', [CitasController::class, 'crear']);

//Citas/actualizar
$router->get('/actualizar-cita', [CitasController::class, 'actualizar']);
$router->post('/actualizar-cita', [CitasController::class, 'actualizar']);

//Citas/Eliminar
$router->post('/citas/eliminar', [CitasController::class, 'eliminar']);
//Menu
$router->get('/menu', [MenuController::class, 'index']);

//Doctor
$router->get('/doctor', [DoctorController::class, 'index']);

//Doctor/crear
$router->get('/crear-doctor', [DoctorController::class, 'crear']);
$router->post('/crear-doctor', [DoctorController::class, 'crear']);

//Doctor/actualizar
$router->get('/actualizar-doctor', [DoctorController::class, 'actualizar']);
$router->post('/actualizar-doctor', [DoctorController::class, 'actualizar']);

//Doctor/Eliminar
$router->post('/doctor/eliminar', [DoctorController::class, 'eliminar']);

//Paciente
$router->get('/paciente', [PacienteController::class, 'index']);

//Paciente/actualizar
$router->get('/actualizar-paciente', [PacienteController::class, 'actualizar']);
$router->post('/actualizar-paciente', [PacienteController::class, 'actualizar']);

//Paciente/crear-paciente
$router->get('/crear-paciente', [PacienteController::class, 'crear']);
$router->post('/crear-paciente', [PacienteController::class, 'crear']);
//Paciente/eliminar
$router->post('/paciente/eliminar', [PacienteController::class, 'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();