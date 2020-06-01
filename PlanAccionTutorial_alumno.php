<?php
  $page_title = 'Lista de Acciones';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
  $alumnos = join_Act_table_alumnos($_GET['user']);
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
         </div>
         <div class="pull-right">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Busqueda">
        </div>
        </div>
        <div class="panel-body">
        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
          <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center" style="width: 80%"> Actividad</th>
                <th class="text-center" style="width: 10%">Fecha</th>
                <th class="text-center" style="width: 10%">Subir</th>
              </tr>
            </thead>
            <tbody id="registros_usuarios">
              <?php foreach ($alumnos as $alumnos):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['actividad']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['fecha']); ?></td>
                <td class="text-center" >
                <a href="subir_actividad.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $alumnos['id'];?>" class="btn btn-info btn-xs"  title="Actividad" data-toggle="tooltip"><span class="glyphicon glyphicon-edit"></span></a>
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