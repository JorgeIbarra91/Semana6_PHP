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