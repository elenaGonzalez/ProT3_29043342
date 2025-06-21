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
$routes->get('login', 'Home::login');
$routes->get('servicios', 'Home::servicios');
$routes->get('contactos', 'Home::contactos');
$routes->post('/validar_contacto', 'Home::formValidation');
$routes->get('/user', 'UserController::index');
$routes->get('perfil', 'UserController::perfil');
$routes->get('reservas', 'UserController::reservas');
$routes->post('/buscar_comentarios', 'Home::buscar_comentarios');

/*rutas del Registro de Usuarios */
$routes->get('/registro', 'UserController::create');
$routes->post('/enviar_form', 'UserController::formValidation');

/*rutas del Login */
$routes->get('/login', 'LoginController::index');
$routes->post('/enviar_login', 'LoginController::auth');
$routes->get('/panel', 'PanelController::index', ['filter'=> 'auth']);
$routes->get('/logout', 'LoginController::logout');

/*rutas de Reservas */
$routes->get('/panel/reservas/usuario/(:segment)', 'PanelController::reservas/$1', ['filter'=> 'auth']);
$routes->get('/panel/usuario/(:segment)/editar', 'PanelController::form_editar/$1', ['filter'=> 'auth']);
$routes->post('/panel/usuario/update/(:segment)', 'PanelController::formValidation/$1', ['filter'=> 'auth']);
$routes->get('/panel/usuario/update', 'PanelController::success/$1', ['filter'=> 'auth']);

$routes->get('/panel/usuario/comentar_reserva/(:segment)/(:segment)', 'ReservaController::form_comentario/$1/$2', ['filter'=> 'auth']);
$routes->post('/panel/usuario/comentar_reserva/(:segment)/(:segment)', 'ReservaController::formValidationComentario/$1/$2', ['filter'=> 'auth']);

/*rutas de Admin a Realizar */
$routes->get('/panel/admin/reservas', 'AdminController::gestionar_reservas', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/usuarios', 'AdminController::gestionar_usuarios', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/servicios', 'AdminController::gestionar_servicios', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/usuarios/(:segment)/editar', 'AdminController::form_editar/$1', ['filter'=> 'admin/*']);
$routes->post('/panel/admin/usuarios/update/(:segment)', 'AdminController::formValidation/$1', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/usuarios/(:segment)/reservar', 'ReservaController::form_reservar/$1', ['filter'=> 'admin/*']);
$routes->post('/panel/admin/usuarios/reservar/(:segment)', 'ReservaController::formValidationReserva/$1', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/usuarios/update', 'AdminController::success', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/usuarios/(:segment)/eliminar', 'AdminController::baja_usuario/$1', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/usuarios/(:segment)/reactivar', 'AdminController::reactivar_usuario/$1', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/logout', 'LoginController::logout');
$routes->get('/panel/admin/editar/reserva/(:segment)/(:segment)', 'ReservaController::form_editar_reserva/$1/$2', ['filter'=> 'admin/*']);
$routes->post('/panel/admin/editar_reserva/(:segment)/(:segment)', 'ReservaController::formValidationEditarReserva/$1/$2', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/servicios/(:segment)/editar', 'ServicioController::form_editar/$1', ['filter'=> 'admin/*']);
$routes->post('/panel/admin/servicios/update/(:segment)', 'ServicioController::formValidation/$1', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/crear_servicio', 'ServicioController::form_servicio/$1', ['filter'=> 'admin/*']);
$routes->post('/panel/admin/nuevo_servicio', 'ServicioController::formValidationServicio/$1', ['filter'=> 'admin/*']);

$routes->get('/panel/admin/servicios/(:segment)/eliminar', 'ServicioController::baja_servicio/$1', ['filter'=> 'admin/*']);
$routes->get('/panel/admin/servicios/(:segment)/reactivar', 'ServicioController::reactivar_servicio/$1', ['filter'=> 'admin/*']);