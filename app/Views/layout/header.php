<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>El Faro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 </head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('/') ?>">El Faro</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('/usuarios/registro') ?>">Registro</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('/contactos') ?>">Contacto</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Noticias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('/articulos') ?>">Todas</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/articulos/categoria/deportes') ?>">Deportes</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/articulos/categoria/negocios') ?>">Negocios</a></li>
          </ul>
        </li>
      </ul>
      <a href="<?= base_url('articulos/crear') ?>" class="btn btn-primary">Crear Nuevo Artículo</a>
    </div>
  </div>
</nav>

<div class="container flex-grow-1 mt-4">
<!-- Aqui empieza el contenido principal -->