<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('comentarios', 'Home::comentarios');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('acerca_de', 'Home::acerca_de');
$routes->get('registro', 'Home::registro');
$routes->get('login', 'Home::login');
$routes->get('servicios', 'Home::servicios');
$routes->get('contactos', 'Home::contactos');
$routes->get('/user', 'UserController::index');
$routes->get('perfil', 'UserController::perfil');
$routes->get('reservas', 'UserController::reservas');

/*rutas del Registro de Usuarios */
$routes->get('/registro', 'UserController::create');
$routes->post('/enviar_form', 'UserController::formValidation');

/*rutas del Login */
$routes->get('/login', 'LoginController::index');
$routes->post('/enviar_login', 'LoginController::auth');
$routes->get('/panel', 'PanelController::index', ['filter'=> 'auth']);
$routes->get('/logout', 'LoginController::logout');

/*rutas de Reservas */
$routes->get('/panel/reservas', 'PanelController::reservas', ['filter'=> 'auth']);


