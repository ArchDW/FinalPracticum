<?php
$page_title = 'Agregar Tutores';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
//$groups = find_all('user_groups');
$alumnos = join_alumnos_table();
$maestros = join_maestros_table();
$tutores = join_asesorados_table();
?>
<?php
if (isset($_POST['add_tutores'])) {

  //$req_fields = array('full-name','username','password','level' );
  //validate_fields($req_fields);

  if (empty($errors)) {
    foreach ($_POST['docentes'] as $docentes) :
      foreach ($_POST['matriculas'] as $matriculas) :
        $query = "INSERT INTO tutores (";
        $query .= "claveD,matricula";
        $query .= ") VALUES (";
        $query .= " '{$docentes}','{$matriculas}'";
        $query .= ")";
        if ($db->query($query)) {
          //sucess
          $session->msg('s', " Se agrego correctamente el Tutor");
        } else {
          //failedalumnos
          $session->msg('d', ' No se pudo Agregar Tutor.');
          redirect('add_tutores.php', false);
        }
      endforeach;
    endforeach;
    redirect('add_tutores.php', false);
  } else {
    $session->msg("d", $errors);
    redirect('add_tutores.php', false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>
<?php echo display_msg($msg); ?>
<div class="row">
  <div class="panel panel-default">
    <div class="panel-heading">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Crear Relación Tutorial</span>
      </strong>
      <div class="pull-right">
        <input class="form-control" type="text" id="caja_busqueda" placeholder="Busqueda">
      </div>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post" action="add_tutores.php">
          <div class="panel-body">
            <table class="table table-hover table-condensed table-bordered" id="iddatatable">
              <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                <tr>
                  <th class="text-center">Matrícula</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Licenciatura</th>
                  <th class="text-center">Semestre</th>
                </tr>
              </thead>
              <tbody id="registros_usuarios">

                <?php foreach ($alumnos as $alumnos) : ?>

                  <tr>
                    <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['Licenciatura']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['Semestre']); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <input type="checkbox" name="matriculas[]" value="<?php echo remove_junk($alumnos['matricula']); ?>">
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <div class="panel-body">
            <table class="table table-hover table-condensed table-bordered" id="iddatatable">
              <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                <tr>
                  <th class="text-center">Clave Docente</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Grado Académico</th>
              </thead>
              <tbody id="registros_usuarios">
                <?php foreach ($maestros as $maestros) : ?>
                  <tr>
                    <td class="text-center"> <?php echo remove_junk($maestros['claveD']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($maestros['nombre']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($maestros['GradoAc']); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <input type="radio" name="docentes[]" value="<?php echo remove_junk($maestros['claveD']); ?>">
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

          </div>

          <div class="form-group clearfix">
            <button type="submit" name="add_tutores" class="btn btn-primary">Guardar</button>
            <a href="tutores.php" class="btn btn-default btn-danger">Cancelar</a>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>

<?php include_once('layouts/footer.php'); ?>