<!-- Columna lateral izquierda con temas -->
<div class="col-md-3">
  <div class="sidebar">
    <!-- Lista de categorías del blog -->
    <h5>Temas</h5>
    <ul class="list-unstyled">
        <li><a href="<?= base_url('articulos/categoria/deportes') ?>">🏅Deportes</a></li>
        <li><a href="<?= base_url('articulos/categoria/negocios') ?>">💼 Negocios</a></li>
        <li><a href="<?= base_url('articulos/categoria/tecnologia') ?>">💻 Tecnología</a></li>
        <li><a href="<?= base_url('articulos/categoria/cultura') ?>">🎭 Cultura</a></li>
    </ul>
  </div>
</div>

<!-- Columna principal donde aparecen los artículos -->
<div class="col-md-9">
  <!-- Bloque de bienvenida -->
  <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
    <h1 class="text-primary fw-bold">¡Bienvenido a El Faro!</h1>
    <p class="text-muted">
      Descubre las últimas tendencias, reflexiones y artículos de actualidad en tu portal de confianza.
    </p>
  </div>

  <!-- Mensaje de confirmación (al crear o eliminar artículo) -->
  <?php if(session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
  <?php endif; ?>

  <!-- Título de la sección -->
  <h4 class="mb-4">Posts Recientes</h4>

  <!-- Verifica si hay artículos -->
  <?php if(empty($articulos)): ?>
    <div class="alert alert-info">No hay artículos disponibles.</div>
  <?php else: ?>

    <!-- Se muestran los artículos en formato tarjetas (2 por fila) -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php foreach($articulos as $articulo): ?>
      <div class="col">
        <div class="card h-100">
          <!-- Imagen superior si existe -->
          <?php if(!empty($articulo['imagen'])): ?>
            <img src="<?= base_url('uploads/' . esc($articulo['imagen'])) ?>" class="card-img-top" alt="Imagen del artículo">
          <?php endif; ?>

          <div class="card-body">
            <!-- Título y texto -->
            <h5 class="card-title"><?= esc($articulo['titulo']) ?></h5>
            <p class="card-text"><?= esc(substr($articulo['contenido'], 0, 100)) ?>...</p>
            <!-- Botón para ver el artículo completo -->
            <a href="<?= base_url('articulos/ver/' . $articulo['id']) ?>" class="btn btn-outline-primary btn-sm">Leer más</a>
          </div>

          <div class="card-footer text-muted small">
            Publicado el <?= date("d/m/Y H:i", strtotime($articulo['fecha'])) ?> |
            Categoría: <?= esc(ucfirst($articulo['categoria'])) ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div> <!-- fin columna principal -->