<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('usuarios/registro', 'Usuarios::registro');
$routes->post('usuarios/guardarRegistro', 'Usuarios::guardarRegistro');
$routes->get('contactos', 'Contactos::index');
$routes->post('contactos/enviar', 'Contactos::enviar');
$routes->get('articulos', 'Articulos::index');
$routes->get('articulos/categoria/(:segment)', 'Articulos::categoria/$1');
$routes->get('articulos/crear', 'Articulos::crear');
$routes->post('articulos/guardar', 'Articulos::guardar');