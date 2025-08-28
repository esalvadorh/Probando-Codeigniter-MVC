<?= $this->include('partials/navbar') ?>
<div class="container">
  <h4>Cursos</h4>
  <a href="<?= base_url('cursos/create') ?>" class="btn waves-effect waves-light"><i class="material-icons left">add</i>Nuevo</a>
  <?php if(session('msg')): ?><p class="green-text"><?= esc(session('msg')) ?></p><?php endif; ?>
  <table class="striped responsive-table">
    <thead>
      <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Activo</th><th>Acciones</th></tr>
    </thead>
    <tbody>
      <?php foreach($cursos as $c): ?>
      <tr>
        <td><?= esc($c['id']) ?></td>
        <td><?= esc($c['nombre']) ?></td>
        <td><?= esc($c['descripcion']) ?></td>
        <td><?= $c['activo'] ? 'Sí' : 'No' ?></td>
        <td>
          <a class="btn-small" href="<?= base_url('cursos/edit/'.$c['id']) ?>"><i class="material-icons">edit</i></a>
          <a class="btn-small red" href="<?= base_url('cursos/delete/'.$c['id']) ?>" onclick="return confirm('Eliminar curso?')"><i class="material-icons">delete</i></a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
