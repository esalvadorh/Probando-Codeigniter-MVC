<?= $this->include('partials/navbar') ?>
<div class="container">
  <h4>Nuevo Curso</h4>
  <?php if($errors = session('errors')): ?>
    <ul class="red-text"><?php foreach($errors as $e) echo "<li>".esc($e)."</li>"; ?></ul>
  <?php endif; ?>
  <form method="post" action="<?= base_url('cursos/store') ?>">
    <div class="input-field">
      <input type="text" name="nombre" id="nombre" required>
      <label for="nombre">Nombre</label>
    </div>
    <div class="input-field">
      <textarea class="materialize-textarea" name="descripcion" id="descripcion"></textarea>
      <label for="descripcion">Descripción</label>
    </div>
    <p>
      <label>
        <input type="checkbox" name="activo" checked />
        <span>Activo</span>
      </label>
    </p>
    <button class="btn">Guardar</button>
  </form>
</div>
