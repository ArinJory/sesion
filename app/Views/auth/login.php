<?= view('templates/header') ?>
<div class="container mt-5">
  <h2>Iniciar Sesión</h2>
  <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>
  <form action="/login" method="post">
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Contraseña</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary w-100">Entrar</button>
  </form>
  <p class="mt-3 text-center">
    ¿No tienes cuenta? <a href="/register">Regístrate aquí</a>
  </p>
</div>
<?= view('templates/footer') ?>
