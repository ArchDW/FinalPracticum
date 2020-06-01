 <?php
  $page_title = 'Lista de Tutores';
  require_once('includes/load.php');
  $tutores = join_tutores_table();
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
           <a href="add_tutores.php" class="btn btn-primary">CREAR RELACION TUTORIAL</a>
         </div>
         <div class="pull-left">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Busqueda">
        </div>
        </div>
        <div class="panel-body">
        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center">Clave</th>
                <th class="text-center">Profesor(a)</th>
                <th class="text-center">Matrícula</th>
                <th class="text-center">Estudiante</th>
                <th class="text-center" style="width: 10%;">Eliminar Relación</th>
              </tr>
            </thead>
            <tbody id="registros_usuarios">
              <?php foreach ($tutores as $tutores):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($tutores['ClaveD']); ?> </td>
                <td class="text-center"> <?php echo remove_junk($tutores['Docente']); ?> </td>
                <td class="text-center"> <?php echo remove_junk($tutores['Matricula']); ?> </td>
                <td class="text-center"> <?php echo remove_junk($tutores['Alumno']); ?> </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="delete_tutor.php?id=<?php echo $tutores['ClaveD'];?>&matricula=<?php echo $tutores['Matricula'];?>" class="btn btn-danger btn-xs"  title="eliminar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
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
  <script type="text/javascript">
  $(document).ready(function() {
    $('#iddatatable').DataTable();
  } );
</script>
  <?php include_once('layouts/footer.php'); ?>