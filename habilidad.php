<?php
$page_title = 'Agregar Actividad';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
$alumnos = join_asesor2_table($_GET['user']);
?>
<?php
if (isset($_POST['habilidad'])) {

  //$req_fields = array('full-name','username','password','level' );
  //validate_fields($req_fields);

  if (empty($errors)) {
    $dia = (int) remove_junk($db->escape($_POST['dia']));
    $mes = (int) remove_junk($db->escape($_POST['mes']));
    $año = (int) remove_junk($db->escape($_POST['ano']));
    if ($año < 0) {
      $año = $año * -1;
    }
    if ($dia === 0 || $mes === 0 || $año === 0) {
      $session->msg('d', ' No Se Agregó correctamente el Desarrollo de Habilidades');
      redirect('habilidad.php?user=' . $_GET['user'], false);
    } else {
      $fecha =  $dia . '/' . $mes . '/' . $año;
      $estado = remove_junk($db->escape($_POST['estado']));
      foreach ($_POST['matriculas'] as $matriculas) :
        $query = "INSERT INTO habilidad(";
        $query .= "fecha, matricula, claveD";
        $query .= ") VALUES (";
        $query .= " '{$fecha}','{$matriculas}','{$_GET['user']}'";
        $query .= ")";
        if ($db->query($query)) {
          //sucess
          $session->msg('s', " Se agrego correctamente la Actividad" . $dia . $mes . $año);
        } else {
          //failed
          $session->msg('d', ' No Se agrego correctamente la Actividad');
          redirect('habilidad.php?user=' . $_GET['user'], false);
        }
      endforeach;
      redirect('habilidad.php?user=' . $_GET['user'], false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('habilidad.php?user=' . $_GET['user'], false);
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
        <span>Agregar Clase</span>
      </strong>
      <div class="pull-right">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Búsqueda">
        </div>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post" action="habilidad.php?user=<?php echo $_GET['user']; ?>">
          <div class="form-group">
          <table class="table table-hover table-condensed table-bordered" id="iddatatable">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                <tr>
                  <th class="text-center">Matrícula</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Licenciatura</th>
                  <th class="text-center">Semestre</th>
                  <th class="text-center">Seleccione al estudiante observado</th>
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
          <div class="form-group">
            <label for="level">Día de la observación</label>
            <select class="form-control" name="dia">
              <option value="0">Seleccione:</option>
              <?php
              $dia = 1;
              while ($dia < 32) {
                echo '<option value="' . $dia . '">' . $dia . '</option>';
                $dia = $dia + 1;
              }

              ?>
            </select>
            <label for="level">Mes</label>
            <select class="form-control" name="mes">
              <option value="0">Seleccione:</option>
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>

              
            </select>
            <label for="ano">Año</label>
            <input type="number" class="form-control" name="ano" placeholder="Ejemplo: <?php echo date("Y"); ?>" required>

          </div>
          <div class="form-group clearfix">
            <button type="submit" name="habilidad" class="btn btn-primary">Guardar</button>
            <a href="EvaluacionClase.php?user=<?php echo $_GET['user']; ?>" class="btn btn-default btn-danger">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>