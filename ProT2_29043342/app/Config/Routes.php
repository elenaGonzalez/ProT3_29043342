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
$routes->get('/user', 'User::index');
$routes->get('perfil', 'User::perfil');
$routes->get('reservas', 'User::reservas');







