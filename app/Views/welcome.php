<?= view('templates/header') ?>
<div class="container mt-5 text-center">
  <h2>¡Bienvenido, <?= esc($user['nombre']) ?>!</h2>
  <a href="/logout" class="btn btn-danger mt-3">Cerrar sesión</a>
</div>
<?= view('templates/footer') ?>
