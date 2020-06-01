<?php
$page_title = 'Agregar Acciones';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
$groups = find_all('licenciatura');
?>
<?php
if (isset($_POST['add_desarrollo'])) {
  if (empty($errors)) {

    $accion   = remove_junk($db->escape($_POST['accion']));
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
      $query = "INSERT INTO acciones (";
      $query .= "accion,protocolo,fecha";
      $query .= ") VALUES (";
      $query .= " '{$accion}','{$_GET['p']}','{$fecha}'";
      $query .= ")";
      if ($db->query($query)) {
        //sucess
        $session->msg('s', ' Se Agregó correctamente la Acción.');
        redirect('add_desarrollo.php?user=' . $_GET['user'] . '&p=' . $_GET['p'], false);
      } else {
        //failed
        $session->msg('d', ' No se Agrego correctamente la Acción.');
        redirect('add_desarrollo.php?user=' . $_GET['user'] . '&p=' . $_GET['p'], false);
      }
    }
  } else {
    $session->msg("d", $errors);
    redirect('add_desarrollo.php?user=' . $_GET['user'] . '&p=' . $_GET['p'], false);
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
        <span>Agregar Acción</span>
      </strong>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post" action="add_desarrollo.php?user=<?php echo $_GET['user']; ?>&p=<?php echo $_GET['p']; ?>">
          <div class="form-group">
            <label for="accion">Acción</label>
            <textarea type="text" class="form-control" name="accion" placeholder="Acción o tarea a realizar" require></textarea>
          </div>
          <div class="form-group">
            <label for="level">Día</label>
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
            <button type="submit" name="add_desarrollo" class="btn btn-primary">Guardar</button>
            <a href="desarrollo.php?user=<?php echo $_GET['user']; ?>&p=<?php echo $_GET['p']; ?>" class="btn btn-default btn-danger">Cancelar</a>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>
<?php include_once('layouts/footer.php'); ?>