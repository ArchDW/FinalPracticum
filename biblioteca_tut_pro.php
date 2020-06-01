<?php
  $page_title = 'Lista de Archivos para la Tutorias Profesionales';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
page_require_level(2);
  $alumnos = join_biblioteca_tut_pro($_GET['user']);
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
            <a href="add_biblioteca.php?user=<?php echo $_GET['user']; ?>" class="btn btn-primary">Agregar Archivo</a>
         </div>
         <div class="pull-left">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Busqueda">
        </div>
        </div>
        <div class="panel-body">
        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
          <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center">Archivo</th>
                <th class="text-center">Matrícula</th>
                <th class="text-center">Estudiante</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody id="registros_usuarios">
              <?php foreach ($alumnos as $alumnos):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['alumno']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                      <a href="#?user=<?php echo $_GET['user']; ?>&id=<?php echo $alumnos['id'];?>" class="btn btn-success btn-xs"  title="Descargar" data-toggle="tooltip"><span class="glyphicon glyphicon-ok"></span></a>
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
