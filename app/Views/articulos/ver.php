<div class="container mt-4">
    <h1><?= esc($articulo['titulo']) ?></h1>

    <?php if (!empty($articulo['imagen'])): ?>
        <img src="<?= base_url('uploads/' . esc($articulo['imagen'])) ?>" alt="Imagen noticia" class="img-fluid mb-3">
    <?php endif; ?>

    <p><small class="text-muted">
        Publicado el <?= date('d/m/Y H:i', strtotime($articulo['fecha'])) ?> 
        | Categoría: <strong><?= esc(ucfirst($articulo['categoria'])) ?></strong>
    </small></p>

    <div class="mt-3">
        <p><?= nl2br(esc($articulo['contenido'])) ?></p>
    </div>

    <a href="<?= base_url('articulos') ?>" class="btn btn-secondary mt-3">⬅ Volver a artículos</a>
</div>