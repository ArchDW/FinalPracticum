<?php
  $page_title = 'Lista de Acciones de los Proyectos';
  require_once('includes/load.php');
  page_require_level(2);
   $alumnos = join_acciones_table();
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
           <a href="add_desarrollo.php?user=<?php echo $_GET['user']; ?>&p=<?php echo $_GET['p']; ?>" class="btn btn-primary">Agregar Acciones</a>
         </div>
         <div class="pull-left">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Busqueda">
        </div>
        </div>
        <div class="panel-body">
        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
          <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center" style="width: 30%;">Acción</th>
                <th class="text-center" style="width: 20%;">Fecha Limite</th>
                <th class="text-center" style="width: 10%;">Evaluación</th>
                <th class="text-center" style="width: 10%;">Matricula</th>
                <th class="text-center" style="width: 30%;">Nombre</th>
                
              </tr>
            </thead>
            <tbody id="registros_usuarios">
              <?php foreach ($alumnos as $alumnos):?>
                <tr>
                  <?php if( $alumnos['id'] === $_GET['p'] ): ?>
                    <td class="text-center"> <?php echo remove_junk($alumnos['accion']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['fecha']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['evaluacion']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>