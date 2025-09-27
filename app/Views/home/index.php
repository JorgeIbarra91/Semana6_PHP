<h1>Bienvenido a El Faro</h1>
<p>Noticias actualizadas dinamicamente.</p>
<?php if ($ultimaNoticia): ?>
    <h2>Ultima Noticia</h2>
    <div class="card mb-3">
        <?php if ($ultimaNoticia['imagen']): ?>
            <img src="<?= base_url('uploads/' . esc($ultimaNoticia['imagen'])) ?>" class="card-img-top" alt="Imagen noticia">
        <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title"><?= esc($ultimaNoticia['titulo']) ?></h5>
            <p class="card-text"><?= esc(substr($ultimaNoticia['contenido'], 0, 150)) ?>...</p>
            <p class="card-text"><small class="text-muted"><?= date('d/m/Y H:i', strtotime($ultimaNoticia['fecha'])) ?> - Categoria: <?= esc($ultimaNoticia['categoria']) ?></small></p>
        </div>
    </div>
<?php else: ?>
    <p>No hay noticias disponibles.</p>
<?php endif; ?>

