<?= view('templates/header') ?>
<div class="container mt-5">
  <h2>Crear cuenta</h2>
  <form action="/register" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nombre</label>
      <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Contraseña</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Avatar (opcional)</label>
      <input type="file" name="avatar" class="form-control" accept="image/*">
    </div>
    <button class="btn btn-success w-100">Registrar</button>
  </form>
</div>
<?= view('templates/footer') ?>

