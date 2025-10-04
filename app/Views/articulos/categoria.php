<!-- Columna lateral izquierda con lista de categorías -->
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

<!-- Sección principal con los artículos filtrados -->
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