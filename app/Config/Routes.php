<?php

namespace Config;

// Se importan los servicios del sistema de enrutamiento de CodeIgniter
$routes = Services::routes();

// Carga del archivo base de rutas del sistema (por compatibilidad)
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 | --------------------------------------------------------------------
 | Rutas del Proyecto "El Faro"
 | --------------------------------------------------------------------
 | En esta sección se definen las rutas personalizadas. 
 | Se utiliza el controlador "Articulos" como página principal.
 */

$routes->setDefaultNamespace('App\Controllers');  // Carpeta principal de controladores
$routes->setDefaultController('Articulos');       // Controlador a ejecutar por defecto
$routes->setDefaultMethod('index');               // Método predeterminado del controlador
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// Ruta principal del sitio (http://localhost:8080/)
$routes->get('/', 'Articulos::index'); 
/*
  Explicación:
  Al ingresar al sitio, el método index() del controlador Articulos
  es ejecutado, mostrando la lista de noticias recientes.
  Con esto, se elimina la vista anterior llamada “Inicio”.
*/

// Rutas adicionales del módulo de noticias
$routes->get('articulos', 'Articulos::index');
$routes->get('articulos/crear', 'Articulos::crear');
$routes->post('articulos/guardar', 'Articulos::guardar');
$routes->get('articulos/ver/(:num)', 'Articulos::ver/$1');
$routes->get('articulos/categoria/(:segment)', 'Articulos::categoria/$1');

// Ruta del formulario de contacto (opcional)
$routes->get('contactos', 'Contactos::index');