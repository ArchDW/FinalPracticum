<?php
$page_title = 'Lista de Sesiones';
require_once('includes/load.php');
page_require_level(2);
$alumnos = join_sesiones_table($_GET['user']);
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
          <a href="add_sesiones.php?user=<?php echo $_GET['user']; ?>" class="btn btn-primary">Agendar Sesión</a>
        </div>
        <div class="pull-left">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Búsqueda">
        </div>
      </div>
      <div class="panel-body">
      <table class="table table-hover table-condensed table-bordered" id="iddatatable">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
            <tr>
              <th class="text-center" style="width: 10%;">Sesiones</th>
              <th class="text-center" style="width: 25%;">Propósito </th>
              <th class="text-center" style="width: 10%;">Matrícula</th>
              <th class="text-center" style="width: 15%;">Nombre</th>
              <th class="text-center" style="width: 30%;">Acuerdos</th>
              <th class="text-center" style="width: 10%;">Acciones</th>
            </tr>
          </thead>
          <tbody id="registros_usuarios">
            <?php foreach ($alumnos as $alumnos) : ?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['id']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['proposito']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['acuerdos']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="add_actividad_Sesion.php?user=<?php echo $_GET['user']; ?>&m=<?php echo $alumnos['matricula']; ?>" class="btn btn-info btn-xs" title="Actividades" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="add_sesiones_acuerdo.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $alumnos['IDE']; ?>" class="btn btn-success btn-xs" title="Acuerdos" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-pushpin"></span>
                    </a>
                    <a href="#?user=<?php echo $_GET['user']; ?>" class="btn btn-warning btn-xs" title="Evaluación " data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
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