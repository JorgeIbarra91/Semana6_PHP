<?php if(session()->getFlashdata('mensaje')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>
<h2>Formulario de Contacto</h2>
<form method="post" action="<?= base_url('/contactos/enviar') ?>">
  <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" value="<?= old('nombre') ?>" required>
  <input type="email" name="correo" class="form-control mb-2" placeholder="Correo" value="<?= old('correo') ?>" required>
  <textarea name="mensaje" class="form-control mb-2" placeholder="Mensaje" required><?= old('mensaje') ?></textarea>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
