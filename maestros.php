 <?php
  $page_title = 'Lista de Maestros';
  require_once('includes/load.php');
  $maestros = join_maestros_table();
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
           <a href="add_maestros.php" class="btn btn-primary">Agregar Profesor(a)</a>
         </div>
         <div class="pull-left">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Busqueda">
        </div>
        </div>
        <div class="panel-body">
          <table class="table table-hover table-condensed table-bordered" id="iddatatable">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center" style="width: 5%">Clave</th>
                <th class="text-center">Nombre(s)</th>
                <th class="text-center">Apellido Paterno</th>
                <th class="text-center">Apellido Materno</th>
                <th class="text-center">Fecha de Nacimiento</th>
                <th class="text-center">Correo Electrónico</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Grado Académico</th>
                <th class="text-center">Acciones </th>
              </tr>
            </thead>
            <tbody id="registros_usuarios">
              <?php foreach ($maestros as $maestros):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($maestros['claveD']); ?></td>
                <td class="text-center"> <?php echo remove_junk($maestros['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($maestros['primerAp']); ?></td>
                <td class="text-center"> <?php echo remove_junk($maestros['SegundoAp']); ?></td>
                <td class="text-center"> <?php echo remove_junk($maestros['fecha_nacimiento']); ?></td>
                <td class="text-center"> <?php echo remove_junk($maestros['email']); ?></td>
                <td class="text-center" >
                  <?php if($maestros['activo'] === 'Activo'): ?>
                    <span class="label label-success"><?php echo remove_junk($maestros['activo']); ?></span>
                  <?php else: ?>
                    <span class="label label-danger"><?php echo remove_junk($maestros['activo']); ?></span>
                  <?php endif;?>
                </td>
                <td class="text-center"> <?php echo remove_junk($maestros['GradoAc']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_maestro.php?id=<?php echo $maestros['claveD'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                      <?php if($maestros['activo'] === 'Activo'): ?>
                        <a href="delete_maestro.php?id=<?php echo $maestros['claveD'];?>&activo=Inactivo" class="btn btn-danger btn-xs"  title="Inactivar" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a>
                      <?php else: ?>
                        <a href="delete_maestro.php?id=<?php echo $maestros['claveD'];?>&activo=Activo" class="btn btn-success btn-xs"  title="Activar" data-toggle="tooltip"><span class="glyphicon glyphicon-ok"></span></a>
                      <?php endif;?>
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
