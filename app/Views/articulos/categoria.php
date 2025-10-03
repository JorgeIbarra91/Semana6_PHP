<h1>Noticias de <?= esc($categoria) ?></h1>

<?php if(empty($articulos)): ?>
    <p>No hay noticias en esta categoría.</p>
<?php else: ?>
    <?php foreach($articulos as $articulo): ?>
        <div class="card mb-3">
            <?php if(!empty($articulo['imagen'])): ?>
                <img src="<?= base_url('uploads/' . esc($articulo['imagen'])) ?>" class="card-img-top" alt="Imagen noticia">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?= esc($articulo['titulo']) ?></h5>
                <p class="card-text"><?= esc(substr($articulo['contenido'], 0, 150)) ?>...</p>
                <p class="card-text"><small class="text-muted"><?= date('d/m/Y H:i', strtotime($articulo['fecha'])) ?></small></p>
                <a href="<?= base_url('articulos/ver/' . $articulo['id']) ?>" class="btn btn-primary btn-sm">Leer más</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>