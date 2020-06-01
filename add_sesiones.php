<?php
$page_title = 'Agregar Sesión';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_level(1);
//$groups = find_all('user_groups');
$groups = find_all('licenciatura');
$alumnos = join_asesor2_table($_GET['user']);
?>
<?php
if (isset($_POST['add_sesiones'])) {

  //$req_fields = array('full-name','username','password','level' );
  //validate_fields($req_fields);

  if (empty($errors)) {
    foreach ($_POST['matriculas'] as $matriculas) :
      $matricula = remove_junk($db->escape($matriculas));
      $nombre   = remove_junk($db->escape($_POST['nombre']));
      $sesion   = remove_junk($db->escape($_POST['sesion']));

      $query = "INSERT INTO sesiones (";
      $query .= "proposito,matricula, claveD, nombre";
      $query .= ") VALUES (";
      $query .= " '{$sesion}','{$matricula}', '{$_GET['user']}', '{$nombre}'";
      $query .= ")";
      if ($db->query($query)) {
        //sucess
        $session->msg('s', " Se Agregó correctamente la sesión de " . $nombre);
        //redirect('add_sesiones.php?user='.$_GET['user'], false);
      } else {
        //failed
        $session->msg('d', ' No se pudo Agregar la Sesión de ' . $nombre);
        redirect('add_sesiones.php?user=' . $_GET['user'], false);
      }
    endforeach;
    redirect('add_sesiones.php?user=' . $_GET['user'], false);
  } else {
    $session->msg("d", $errors);
    redirect('add_sesiones.php?user=' . $_GET['user'], false);
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
        <span>Agendar Sesión</span>
      </strong>
      <div class="pull-right">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Búsqueda">
        </div>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post" action="add_sesiones.php?user=<?php echo $_GET['user']; ?>">
          <div class="form-group">
            <label for="name">Sesión</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ejemplo: S1, S14/05, etc." required>
          </div>
          <div class="form-group">
            <label for="sesion">Propósito</label>
            <textarea type="text" class="form-control" name="sesion" placeholder="Propósito de la sesión"></textarea>
          </div>
          <div class="panel-body">
          <table class="table table-hover table-condensed table-bordered" id="iddatatable">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                <tr>
                  <th class="text-center">Matrícula</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido Paterno</th>
                  <th class="text-center">Apellido Materno</th>
                  <th class="text-center">Licenciatura</th>
                  <th class="text-center">Semestre</th>
                  <th class="text-center">Seleccione con quien(es) agenderá la sesión</th>
                </tr>
              </thead>
              <tbody id="registros_usuarios">
                <?php foreach ($alumnos as $alumnos) : ?>
                  <tr>
                    <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['primerAp']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['SegundoAp']); ?></td>
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
          <div class="form-group clearfix">
            <button type="submit" name="add_sesiones" class="btn btn-primary">Guardar</button>
            <a href="sesiones.php?user=<?php echo $_GET['user']; ?>" class="btn btn-default btn-danger">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>