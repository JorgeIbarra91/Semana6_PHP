<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>El Faro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('/') ?>">El Faro</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('/usuarios/registro') ?>">Registro</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('/contactos') ?>">Contacto</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4">