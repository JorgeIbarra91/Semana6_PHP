<?php if(session()->getFlashdata('mensaje')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
<?php endif; ?>

<h1>Noticias Recientes</h1>

<?php if(empty($articulos)): ?>
    <p>No hay noticias disponibles.</p>
<?php else: ?>
    <?php foreach($articulos as $articulo): ?>
        <div class="card mb-3">
            <?php if($articulo['imagen']): ?>
                <img src="<?= base_url('writable/uploads/' . $articulo['imagen']) ?>" class="card-img-top" alt="Imagen noticia">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?= esc($articulo['titulo']) ?></h5>
                <p class="card-text"><?= esc(substr($articulo['contenido'], 0, 150)) ?>...</p>
                <p class="card-text"><small class="text-muted"><?= date('d/m/Y H:i', strtotime($articulo['fecha'])) ?> - Categoria: <?= esc($articulo['categoria']) ?></small></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>