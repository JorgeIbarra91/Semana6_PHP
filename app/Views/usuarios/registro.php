<h2>Registro de Usuario</h2>
<?php if(session()->getFlashdata('mensaje')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
<?php endif; ?>
<form method="post" action="<?= base_url('/usuarios/guardarRegistro') ?>">
  <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
  <input type="email" name="correo" class="form-control mb-2" placeholder="Correo" required>
  <input type="password" name="password" class="form-control mb-2" placeholder="Contraseña" required>
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>