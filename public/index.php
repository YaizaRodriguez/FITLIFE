<?php

require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use Controllers\LoginController;
use Controllers\RutinaController;
use Controllers\ExpertoController;
use Controllers\PaginasController;

$router = new Router();      //Nueva instancia.


//CRUD para trabajar con las Rutinas.
$router->get('/admin', [RutinaController::class, 'index']); //Url admin. Busca el metodo index en el controlador RutinaController.
$router->get('/rutinas/crear', [RutinaController::class, 'crear']);
$router->post('/rutinas/crear', [RutinaController::class, 'crear']);
$router->get('/rutinas/actualizar', [RutinaController::class, 'actualizar']);
$router->post('/rutinas/actualizar', [RutinaController::class, 'actualizar']);
$router->post('/rutinas/eliminar', [RutinaController::class, 'eliminar']);

//CRUD para trabajar con las Expertos.
$router->get('/expertos/crear', [ExpertoController::class, 'crear']);
$router->post('/expertos/crear', [ExpertoController::class, 'crear']);
$router->get('/expertos/actualizar', [ExpertoController::class, 'actualizar']);
$router->post('/expertos/actualizar', [ExpertoController::class, 'actualizar']);
$router->post('/expertos/eliminar', [ExpertoController::class, 'eliminar']);


//No requiere autenticación 
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/rutinas', [PaginasController::class, 'rutinas']);
$router->get('/rutina', [PaginasController::class, 'rutina']);
$router->get('/nutricion', [PaginasController::class, 'nutricion']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/tienda', [PaginasController::class, 'tienda']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

//Login y Autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);


$router->comprobarRutas();   //Llamar a la funcion comprobarRutas().
                            

