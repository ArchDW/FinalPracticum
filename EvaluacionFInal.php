<?php
  $page_title = 'Lista de Alumnos';
  require_once('includes/load.php');
  $alumnos = join_inducion_table($_GET['user']);
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
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Busqueda">
        </div>
        </div>
        <div class="panel-body">
        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
          <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center" style="width: 30%;">Proyecto</th>
                <th class="text-center" style="width: 10%;">Matricula</th>
                <th class="text-center" style="width: 30%;">Nombre</th>
                <th class="text-center" style="width: 10%;">Califiación</th>
                <th class="text-center" style="width: 10%;">Estado</th>
                <th class="text-center" style="width: 10%;">Evaluación</th>
              </tr>
            </thead>
            <tbody id="registros_usuarios">
              <?php foreach ($alumnos as $alumnos ):?>
                <tr>
                  <td class="text-center"> <?php echo remove_junk($alumnos['proyecto']); ?></td>
                  <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                  <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                  <td class="text-center"> <?php echo remove_junk($alumnos['evaluacion']); ?></td>
                  <td class="text-center" >
                  <?php if($alumnos['estado'] === 'Activo'): ?>
                    <span class="label label-success"><?php echo remove_junk($alumnos['estado']); ?></span>
                  <?php else: ?>
                    <span class="label label-danger"><?php echo remove_junk($alumnos['estado']); ?></span>
                  <?php endif;?>
                </td>
                  <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_protocolo.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $alumnos['id'];?>&mod=<?php echo $alumnos['modalidad']; ?>" class="btn btn-info btn-xs"  title="Evaluacióm" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                  </div>
                </td>

                <tr>
                  <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>