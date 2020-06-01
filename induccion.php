<?php
  $page_title = 'Lista de Protocolos';
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
         <div class="pull-right"></div>
        </div>
        <div class="panel-body">
          <table id="lookup" class="table table-bordered">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center">Proyecto de titulación</th>
                <th class="text-center">Modalidad de Titulación</th>
                <th class="text-center">Tematica o Problema de Interes</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($alumnos as $alumnos):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['modalidad']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['tematica']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                      <a href="subir_protocolo.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $alumnos['id'];?>" class="btn btn-success btn-xs"  title="Subir" data-toggle="tooltip"><span class="glyphicon glyphicon-ok"></span></a>
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
