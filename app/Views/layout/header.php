<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'El Faro - Noticias') ?></title>


    <!-- Bootstrap 5 (para el diseño responsivo y moderno) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados para el proyecto "El Faro" -->
    <style>
        body {
            background-color: #f4f6fb; /* Fondo general gris claro */
        }

        /* Barra de navegación principal */
        .navbar {
            background-color: #007bff; /* Azul institucional */
        }

        .navbar a {
            color: white !important;
            font-weight: 500;
        }

        /* Configuración de la barra lateral */
        .sidebar {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        /* Diseño de las tarjetas de los artículos */
        .card {
            border: none;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        .card:hover {
            transform: scale(1.01);
            transition: 0.2s;
        }

        /* Pie de página */
        footer {
            background: #f8f9fa;
            border-top: 1px solid #e3e3e3;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <!-- Nombre del sitio -->
    <a class="navbar-brand" href="<?= base_url('/') ?>">El Faro</a>

    <!-- Botón de menú para versión móvil -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Sección de enlaces -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!-- Noticias se convierte en la página de inicio -->
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('/') ?>">Noticias</a>
        </li>

        <!-- Enlace para publicar nuevo artículo -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('articulos/crear') ?>">Publicar</a>
        </li>

        <!-- Formulario de contacto (opcional) -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('contactos') ?>">Contacto</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!--
==========================================================
Inicio del contenedor principal
Todas las vistas se mostrarán dentro de este espacio.
==========================================================
-->
<div class="container mt-4">
<div class="row">