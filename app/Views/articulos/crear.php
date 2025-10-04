<div class="col-md-8 offset-md-2">
  <div class="card p-4 shadow-sm mb-5">
    <h2 class="text-center text-primary mb-4">📝 Crear Nuevo Artículo</h2>

    <!-- Muestra errores provenientes del formulario -->
    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Formulario de creación -->
    <form action="<?= base_url('articulos/guardar') ?>" method="post" enctype="multipart/form-data">

      <!-- Campo título -->
      <div class="mb-3">
        <label for="titulo" class="form-label">Título del artículo</label>
        <input type="text" name="titulo" id="titulo" value="<?= old('titulo') ?>" class="form-control" required>
      </div>

      <!-- Campo contenido -->
      <div class="mb-3">
        <label for="contenido" class="form-label">Contenido</label>
        <textarea name="contenido" id="contenido" rows="6" class="form-control" required><?= old('contenido') ?></textarea>
      </div>

      <!-- Selector de categoría -->
      <div class="mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <select name="categoria" id="categoria" class="form-select" required>
          <option value="">Seleccionar categoría...</option>
          <option value="deportes">🏅 Deportes</option>
          <option value="negocios">💼 Negocios</option>
          <option value="tecnologia">💻 Tecnología</option>
          <option value="cultura">🎭 Cultura</option>
        </select>
      </div>

      <!-- Subida de imagen -->
      <div class="mb-3">
        <label for="imagen" class="form-label">Imagen (opcional)</label>
        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
        <div class="form-text">Tamaño máximo: 2 MB</div>
      </div>

      <!-- Botón enviar -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary px-4">Publicar Artículo</button>
      </div>

    </form>
  </div>
</div>