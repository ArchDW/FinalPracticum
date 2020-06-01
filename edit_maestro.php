<?php
$page_title = 'Editar Maestro';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$e_maestro = find_by_id_maestro('maestros', $_GET['id']);
//$groups  = find_all('user_groups');
if (!$e_maestro) {
  $session->msg("d", "Missing user id.");
  redirect('maestros.php');
}
?>

<?php
//Update User basic info
if (isset($_POST['update'])) {
  //$req_fields = array('name','username','level');
  //validate_fields($req_fields);
  if (empty($errors)) {
    $dia = (int) remove_junk($db->escape($_POST['dia']));
    $mes = (int) remove_junk($db->escape($_POST['mes']));
    $año = (int) remove_junk($db->escape($_POST['ano']));
    if ($año < 0) {
      $año = $año * -1;
    }
    if ($dia === 0 || $mes === 0 || $año === 0) {
      $session->msg('d', ' No se modifico correctamente el Alumno');
      redirect('edit_maestro.php?user=' . $_GET['user'], false);
    } else {
      $id = $e_maestro['claveD'];
      $name = remove_junk($db->escape($_POST['nombre']));
      $primerAp = remove_junk($db->escape($_POST['primerAp']));
      $segundoAp = remove_junk($db->escape($_POST['SegundoAp']));
      $status   = remove_junk($db->escape($_POST['activo']));
      $edad = (int) $db->escape($_POST['edad']);
      $status   = remove_junk($db->escape($_POST['status']));
      $gradoAc = remove_junk($db->escape($_POST['GradoAc']));
      $email = remove_junk($db->escape($_POST['email']));
      $sql = "UPDATE maestros SET nombre ='{$name}', primerAp ='{$primerAp}',SegundoAp='{$segundoAp}',fecha_nacimiento='{$fecha}',email='{$email}',activo='{$status}',GradoAc='{$gradoAc}' WHERE claveD='{$db->escape($id)}'";
      $result = $db->query($sql);
      if ($result && $db->affected_rows() === 1) {
        $session->msg('s', "Datos Actualizados ");
        redirect('edit_maestro.php?id=' . $e_maestro['id'], false);
      } else {
        $session->msg('d', ' Lo siento no se actualizó los datos.');
        redirect('edit_maestro.php?id=' . $e_maestro['id'], false);
      }
    }
  } else {
    $session->msg("d", $errors);
    redirect('edit_maestro.php?id=' . $e_maestro['id'], false);
  }
}
?>

<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Actualiza Maestro: Clave del Docente <?php echo remove_junk(ucwords($e_maestro['claveD'])); ?>
        </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="edit_maestro.php?id=<?php echo $e_maestro['claveD']; ?>" class="clearfix">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input required type="text" class="form-control" name="nombre" value=<?php echo remove_junk(ucwords($e_maestro['nombre'])); ?>>
          </div>
          <div class="form-group">
            <label for="apellidoAp">Apellido Paterno</label>
            <input required type="text" class="form-control" name="primerAp" value=<?php echo remove_junk(ucwords($e_maestro['primerAp'])); ?>>
          </div>
          <div class="form-group">
            <label for="apellidoAm">Apellido Materno</label>
            <input required type="text" class="form-control" name="SegundoAp" value=<?php echo remove_junk(ucwords($e_maestro['SegundoAp'])); ?>>
          </div>
          <div class="form-group">
            <label for="level">Día</label>
            <select class="form-control" name="dia">
              <option value="0">Seleccione:</option>
              <option value="01" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '01') echo 'selected="selected"'; ?>>1</option>
              <option value="02" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '02') echo 'selected="selected"'; ?>>2</option>
              <option value="03" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '03') echo 'selected="selected"'; ?>>3</option>
              <option value="04" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '04') echo 'selected="selected"'; ?>>4</option>
              <option value="05" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '05') echo 'selected="selected"'; ?>>5</option>
              <option value="06" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '06') echo 'selected="selected"'; ?>>6</option>
              <option value="07" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '07') echo 'selected="selected"'; ?>>7</option>
              <option value="08" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '08') echo 'selected="selected"'; ?>>8</option>
              <option value="09" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '09') echo 'selected="selected"'; ?>>9</option>
              <option value="10" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '10') echo 'selected="selected"'; ?>>10</option>
              <option value="11" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '11') echo 'selected="selected"'; ?>>11</option>
              <option value="12" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '12') echo 'selected="selected"'; ?>>12</option>
              <option value="13" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '13') echo 'selected="selected"'; ?>>13</option>
              <option value="14" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '14') echo 'selected="selected"'; ?>>14</option>
              <option value="15" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '15') echo 'selected="selected"'; ?>>15</option>
              <option value="16" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '16') echo 'selected="selected"'; ?>>16</option>
              <option value="17" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '17') echo 'selected="selected"'; ?>>17</option>
              <option value="18" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '18') echo 'selected="selected"'; ?>>18</option>
              <option value="19" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '19') echo 'selected="selected"'; ?>>19</option>
              <option value="20" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '20') echo 'selected="selected"'; ?>>20</option>
              <option value="21" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '21') echo 'selected="selected"'; ?>>21</option>
              <option value="22" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '22') echo 'selected="selected"'; ?>>22</option>
              <option value="23" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '23') echo 'selected="selected"'; ?>>23</option>
              <option value="24" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '24') echo 'selected="selected"'; ?>>24</option>
              <option value="25" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '25') echo 'selected="selected"'; ?>>25</option>
              <option value="26" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '26') echo 'selected="selected"'; ?>>26</option>
              <option value="27" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '27') echo 'selected="selected"'; ?>>27</option>
              <option value="28" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '28') echo 'selected="selected"'; ?>>28</option>
              <option value="29" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '29') echo 'selected="selected"'; ?>>29</option>
              <option value="30" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '30') echo 'selected="selected"'; ?>>30</option>
              <option value="31" <?php if (substr($e_maestro['fecha_nacimiento'], 8, 2) === '31') echo 'selected="selected"'; ?>>31</option>

              ?>
            </select>
            <label for="level">Mes</label>
            <select class="form-control" name="mes">
              <option value="00">Seleccione:</option>
              <option value="01" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '01') echo 'selected="selected"'; ?>>Enero</option>
              <option value="02" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '02') echo 'selected="selected"'; ?>>Febrero</option>
              <option value="03" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '03') echo 'selected="selected"'; ?>>Marzo</option>
              <option value="04" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '04') echo 'selected="selected"'; ?>>Abril</option>
              <option value="05" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '05') echo 'selected="selected"'; ?>>Mayo</option>
              <option value="06" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '06') echo 'selected="selected"'; ?>>Junio</option>
              <option value="07" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '07') echo 'selected="selected"'; ?>>Julio</option>
              <option value="08" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '08') echo 'selected="selected"'; ?>>Agosto</option>
              <option value="09" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '09') echo 'selected="selected"'; ?>>Septiembre</option>
              <option value="10" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '10') echo 'selected="selected"'; ?>>Octubre</option>
              <option value="11" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '11') echo 'selected="selected"'; ?>>Noviembre</option>
              <option value="12" <?php if (substr($e_maestro['fecha_nacimiento'], 5, 2) === '12') echo 'selected="selected"'; ?>>Diciembre</option>


            </select>
            <label for="ano">Año</label>
            <?php $año = (int) substr($e_maestro['fecha_nacimiento'], 0, 4) ?>
            <input type="number" class="form-control" name="ano" value="<?php echo $año; ?>" required>

          </div>

      
      <div class="form-group">
        <label for="email">Email</label>
        <input required type="email" class="form-control" name="email" value=<?php echo remove_junk(ucwords($e_maestro['email'])); ?>>
      </div>
      <div class="form-group">
        <label for="GradoAc">Grado Academico</label>
        <select class="form-control" name="GradoAc">
          <option <?php if ($e_maestro['GradoAc'] === 'Doctorado') echo 'selected="selected"'; ?>>Doctorado</option>
          <option <?php if ($e_maestro['GradoAc'] === 'Maestria') echo 'selected="selected"'; ?>>Maestria</option>
          <option <?php if ($e_maestro['GradoAc'] === 'Licenciatura') echo 'selected="selected"'; ?>>Licenciatura</option>
        </select>
      </div>
      <div class="form-group">
        <label for="status">Estado</label>
        <select class="form-control" name="status">
          <option <?php if ($e_maestro['activo'] === 'Activo') echo 'selected="selected"'; ?>>Activo</option>
          <option <?php if ($e_maestro['activo'] === 'Inactivo') echo 'selected="selected"'; ?>>Inactivo</option>
        </select>
      </div>
      <div class="form-group clearfix">
        <button type="submit" name="update" class="btn btn-info">Actualizar</button>
        <a href="maestros.php" class="btn btn-default btn-danger">Cancelar</a>
      </div>
      </form>
    </div>
  </div>
</div>

</div>
<?php include_once('layouts/footer.php'); ?>