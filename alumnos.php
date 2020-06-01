<?php
$page_title = 'Lista de Alumnos';
require_once('includes/load.php');
page_require_level(1);
$alumnos = join_alumnos_table();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <div class="pull-right">
          <a href="add_alumnos.php" class="btn btn-primary">Agregar Estudiante</a>
        </div>
        <div class="pull-left">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Busqueda">
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
          <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
            <tr>
              <th class="text-center">Matrícula</th>
              <th class="text-center">Nombre(s)</th>
              <th class="text-center">Apellido Paterno</th>
              <th class="text-center">Apellido Materno</th>
              <th class="text-center">Fecha de Nacimiento</th>
              <th class="text-center">Licenciatura</th>
              <th class="text-center">Semestre</th>
              <th class="text-center">Correo Electrónico</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody id="registros_usuarios">
            <?php foreach ($alumnos as $alumnos) : ?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['primerAp']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['SegundoAp']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['fecha']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['Licenciatura']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['Semestre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['email']); ?></td>
                <td class="text-center">
                  <?php if ($alumnos['activo'] === 'Activo') : ?>
                    <span class="label label-success"><?php echo remove_junk($alumnos['activo']); ?></span>
                  <?php else : ?>
                    <span class="label label-danger"><?php echo remove_junk($alumnos['activo']); ?></span>
                  <?php endif; ?>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_alumno.php?id=<?php echo $alumnos['matricula']; ?>" class="btn btn-info btn-xs" title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>

                    <?php if ($alumnos['activo'] === 'Activo') : ?>
                      <a href="delete_alumnos.php?id=<?php echo $alumnos['matricula']; ?>&activo=Inactivar" class="btn btn-danger btn-xs" title="Inactivar" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a>
                    <?php else : ?>
                      <a href="delete_alumnos.php?id=<?php echo $alumnos['matricula']; ?>&activo=Activo" class="btn btn-success btn-xs" title="Activar" data-toggle="tooltip"><span class="glyphicon glyphicon-ok"></span></a>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>