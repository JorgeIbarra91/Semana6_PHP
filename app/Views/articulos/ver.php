<?php
// Vista: Detalle de un artículo
// Variable que esta vista espera recibir del controlador:
// - $articulo (array): Un array con los datos completos del artículo.
?>

<!-- INICIO DE MEJORA 2: Contenedor para mejor legibilidad y centrado -->
<!-- Usamos clases de Bootstrap (container, row, col, justify-content-center) para centrar el contenido. -->
<!-- lh-lg (line-height large) y fs-5 (font-size 5) mejoran la lectura del texto. -->
<div class="container py-3">
  <div class="row justify-content-center">
    <!-- Columna vacía para centrar el contenido en pantallas grandes -->
    <div class="col-12 col-lg-8">
      <div class="card p-4 shadow-sm mb-5 lh-lg fs-5">
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
    <!-- Columna vacía derecha para centrar el contenido -->
    <div class="col-md-2 d-none d-lg-block"></div> <!-- Oculta en pantallas pequeñas -->
  </div>
</div>
