<?= $this->include('partials/navbar') ?>
<div class="container">
  <h4>Editar Curso</h4>
  <?php if($errors = session('errors')): ?>
    <ul class="red-text"><?php foreach($errors as $e) echo "<li>".esc($e)."</li>"; ?></ul>
  <?php endif; ?>
  <form method="post" action="<?= base_url('cursos/update/'.$curso['id']) ?>">
    <?= csrf_field() ?>
    <div class="input-field">
      <input type="text" name="nombre" id="nombre" value="<?= esc($curso['nombre']) ?>" required>
      <label class="active" for="nombre">Nombre</label>
    </div>
    <div class="input-field">
      <textarea class="materialize-textarea" name="descripcion" id="descripcion"><?= esc($curso['descripcion']) ?></textarea>
      <label class="active" for="descripcion">Descripción</label>
    </div>
    <p>
      <label>
        <input type="checkbox" name="activo" <?= $curso['activo'] ? 'checked':'' ?> />
        <span>Activo</span>
      </label>
    </p>
    <button class="btn">Actualizar</button>
  </form>
</div>
