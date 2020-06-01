<?php
  $page_title = 'Lista de Alumnos';
  require_once('includes/load.php');
  $alumnos = join_induccion_table_alumnos($_GET['user']);
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
        
        </div>
        <div class="panel-body">
          <table id="lookup" class="table table-bordered">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center" style="width: 30%;">Proyecto</th>
                <th class="text-center" style="width: 40%;">Tematica</th>
                <th class="text-center" style="width: 10%;">Califiación</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($alumnos as $alumnos ):?>
                <tr>
                  <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                  <td class="text-center"> <?php echo remove_junk($alumnos['tematica']); ?></td>
                  <td class="text-center"> <?php echo remove_junk($alumnos['evaluacion']); ?></td>
                <tr>
                  <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>