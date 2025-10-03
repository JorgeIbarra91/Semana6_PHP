<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// ----------------------
// Usuarios
// ----------------------
$routes->get('usuarios/registro', 'Usuarios::registro', ['as' => 'usuarios.registro']);
$routes->post('usuarios/guardarRegistro', 'Usuarios::guardarRegistro', ['as' => 'usuarios.guardarRegistro']);

// ----------------------
// Contactos
// ----------------------
$routes->get('contactos', 'Contactos::index', ['as' => 'contactos']);
$routes->post('contactos/enviar', 'Contactos::enviar', ['as' => 'contactos.enviar']);

// ----------------------
// Artículos
// ----------------------
$routes->get('articulos', 'Articulos::index', ['as' => 'articulos']);
// Ejemplo: /articulos/categoria/deportes
$routes->get('articulos/categoria/(:segment)', 'Articulos::categoria/$1', ['as' => 'articulos.categoria']);

$routes->get('articulos/crear', 'Articulos::crear', ['as' => 'articulos.crear']);
$routes->post('articulos/guardar', 'Articulos::guardar', ['as' => 'articulos.guardar']);

// ----------------------
// [Opcional] Ver artículo individual
// Ejemplo: /articulos/ver/12
// ----------------------
$routes->get('articulos/ver/(:num)', 'Articulos::ver/$1', ['as' => 'articulos.ver']);