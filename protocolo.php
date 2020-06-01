<?php
  $page_title = 'Lista de Protocolos';
  require_once('includes/load.php');
  $alumnos = join_protocolo_table($_GET['user']);
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
           <a href="add_protocolo.php?user=<?php echo $_GET['user']; ?>" class="btn btn-primary">AGREGAR PROYECTO</a>
         </div>
         <div class="pull-left">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Busqueda">
        </div>
        </div>
        <div class="panel-body">
        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
          <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center">Proyecto de titulación</th>
                <th class="text-center">Modalidad de Titulación</th>
                <th class="text-center">Temática o Problema de Interés</th>
                <th class="text-center">Matricula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Modificación</th>
              </tr>
            </thead>
            <tbody id="registros_usuarios">
              <?php foreach ($alumnos as $alumnos):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['Proyecto']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['modalidad']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['Tematica']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                <td class="text-center" >
                  <?php if($alumnos['estado'] === 'Activo'): ?>
                    <span class="label label-success"><?php echo remove_junk($alumnos['estado']); ?></span>
                  <?php else: ?>
                    <span class="label label-danger"><?php echo remove_junk($alumnos['estado']); ?></span>
                  <?php endif;?>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="#?id=<?php echo $alumnos['id'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <?php if($alumnos['estado'] === 'Activo'): ?>
                      <a href="delete_protocolo.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $alumnos['id'];?>&activo=Inactivar" class="btn btn-danger btn-xs"  title="Inactivar" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a>
                    <?php else: ?>
                      <a href="delete_protocolo.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $alumnos['id'];?>&activo=Activo" class="btn btn-success btn-xs"  title="Activar" data-toggle="tooltip"><span class="glyphicon glyphicon-ok"></span></a>
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
<?php include_once('layouts/footer.php'); ?>
