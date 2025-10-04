<!-- Columna vacía (centrar el contenido) -->
<div class="col-md-2"></div>

<!-- Columna central con el contenido del artículo -->
<div class="col-md-8">
  <div class="card p-4 shadow-sm mb-5">
    <!-- Título -->
    <h1 class="text-primary"><?= esc($articulo['titulo']) ?></h1>

    <!-- Imagen principal del artículo -->
    <?php if (!empty($articulo['imagen'])): ?>
        <img src="<?= base_url('uploads/' . esc($articulo['imagen'])) ?>" alt="Imagen noticia" class="img-fluid rounded mb-3">
    <?php endif; ?>

    <!-- Metadatos -->
    <p class="text-muted small">
      Publicado el <?= date('d/m/Y H:i', strtotime($articulo['fecha'])) ?> |
      Categoría: <strong><?= esc(ucfirst($articulo['categoria'])) ?></strong>
    </p>

    <!-- Contenido principal -->
    <p><?= nl2br(esc($articulo['contenido'])) ?></p>

    <!-- Botón para regresar -->
    <a href="<?= base_url('articulos') ?>" class="btn btn-secondary mt-3">⬅ Volver a artículos</a>
  </div>
</div>

<!-- Columna vacía derecha -->
<div class="col-md-2"></div>