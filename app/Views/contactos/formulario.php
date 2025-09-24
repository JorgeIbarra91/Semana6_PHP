<h2>Formulario de Contacto</h2>
<?php if(session()->getFlashdata('error')): ?>
<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>
<?php if(session()->getFlashdata('mensaje')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
<?php endif; ?>
<form method="post" action="<?= base_url('/contactos/enviar') ?>">
  <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
  <input type="email" name="correo" class="form-control mb-2" placeholder="Correo" required>
  <textarea name="mensaje" class="form-control mb-2" placeholder="Mensaje" required></textarea>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>