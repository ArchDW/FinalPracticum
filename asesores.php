<?php
$page_title = 'Tutores página de inicio';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);

$alumnos = join_asesor2_table($_GET['user']);
//$alumnos = join_asesor_table();
?>

<?php include_once('layouts/header.php');  ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <div class="pull-left">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Búsqueda">
        </div>

      </div>
      <div class="panel-body">
        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
          <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
            <tr>
              <th class="text-center">Matrícula</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Apellido Paterno</th>
              <th class="text-center">Apellido Materno</th>
              <th class="text-center">Fecha de Nacimiento</th>
              <th class="text-center">Licenciatura</th>
              <th class="text-center">Semestre</th>
              <th class="text-center">Correo Electrónico</th>
            </tr>
          </thead>
          <tbody id="registros_usuarios">
            <?php foreach ($alumnos as $alumnos) : ?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['primerAp']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['SegundoAp']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['edad']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['Licenciatura']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['Semestre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['email']); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>