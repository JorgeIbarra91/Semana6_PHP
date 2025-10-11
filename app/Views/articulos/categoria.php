<?php
// Vista: Listado de artículos por categoría
// Variables que esta vista espera recibir del controlador:
// - $categoria (string): El nombre de la categoría actual.
// - $articulos (array): Un array de objetos o arrays con los datos de los artículos.
?>

<div class="container py-3">
  <!-- INICIO DE MEJORA 1: Breadcrumb y contador de resultados -->
  <!-- Breadcrumb: Ayuda al usuario a saber dónde está en el sitio. -->
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('articulos') ?>">Artículos</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= esc(ucfirst($categoria)) ?></li>
    </ol>
  </nav>

  <!-- Encabezado con el nombre de la categoría y la cantidad de artículos. -->
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h2 class="h5 mb-0">
      Categoría: <span class="badge text-bg-primary"><?= esc(ucfirst($categoria)) ?></span>
    </h2>
    <span class="text-muted"><?= count($articulos) ?> resultados</span>
  </div>
  <!-- FIN DE MEJORA 1 -->

  <div class="row">
    <!-- Columna lateral izquierda con lista de categorías (TU CÓDIGO ORIGINAL) -->
    <div class="col-md-3">
      <div class="sidebar">
        <h5>Categorías</h5>
        <ul class="list-unstyled">
            <li><a href="<?= base_url('articulos/categoria/deportes') ?>">🏅 Deportes</a></li>
            <li><a href="<?= base_url('articulos/categoria/negocios') ?>">💼 Negocios</a></li>
            <li><a href="<?= base_url('articulos/categoria/tecnologia') ?>">💻 Tecnología</a></li>
            <li><a href="<?= base_url('articulos/categoria/cultura') ?>">🎭 Cultura</a></li>
        </ul>
      </div>
    </div>

    <!-- Sección principal con los artículos filtrados-->
    <div class="col-md-9">
      <div class="bg-white p-4 shadow-sm rounded mb-4">
        <h2 class="text-primary">Noticias de <?= esc($categoria) ?></h2>
        <p class="text-muted">Artículos publicados recientemente en la categoría <strong><?= esc($categoria) ?></strong>.</p>
      </div>

      <?php if(empty($articulos)): ?>
        <div class="alert alert-info">No hay artículos disponibles en esta categoría.</div>
      <?php else: ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <?php foreach($articulos as $articulo): ?>
          <div class="col">
            <div class="card h-100">
              <?php if(!empty($articulo['imagen'])): ?>
                <img src="<?= base_url('uploads/' . esc($articulo['imagen'])) ?>" class="card-img-top" alt="Imagen del artículo">
              <?php endif; ?>

              <div class="card-body">
                <h5 class="card-title"><?= esc($articulo['titulo']) ?></h5>
                <p class="card-text"><?= esc(substr($articulo['contenido'], 0, 120)) ?>...</p>
                <a href="<?= base_url('articulos/ver/' . $articulo['id']) ?>" class="btn btn-outline-primary btn-sm">Leer más</a>
              </div>

              <div class="card-footer text-muted small">
                Publicado el <?= date('d/m/Y H:i', strtotime($articulo['fecha'])) ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>