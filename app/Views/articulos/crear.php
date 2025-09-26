<h1>Crear Nueva Noticia</h1>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form method="post" action="<?= base_url('/articulos/guardar') ?>" enctype="multipart/form-data">
    <input type="text" name="titulo" class="form-control mb-2" placeholder="Titulo" value="<?= old('titulo') ?>" required>
    <textarea name="contenido" class="form-control mb-2" placeholder="Contenido" required><?= old('contenido') ?></textarea>
    <select name="categoria" class="form-control mb-2" required>
        <option value="">Seleccione categoria</option>
        <option value="deportes" <?= old('categoria') == 'deportes' ? 'selected' : '' ?>>Deportes</option>
        <option value="negocios" <?= old('categoria') == 'negocios' ? 'selected' : '' ?>>Negocios</option>
        <option value="otros" <?= old('categoria') == 'otros' ? 'selected' : '' ?>>Otros</option>
    </select>
    <input type="file" name="imagen" class="form-control mb-2" accept="image/*">
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>