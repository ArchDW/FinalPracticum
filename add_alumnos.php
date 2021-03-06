<?php
$page_title = 'Agregar Alumno';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
//$groups = find_all('user_groups');
$groups = find_all('licenciatura');
?>
<?php
if (isset($_POST['add_alumnos'])) {

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
      $session->msg('d', ' No Se agrego correctamente el Desarrollo de Habilidades');
      redirect('add_alumnos.php?user=' . $_GET['user'], false);
    } else {
      $fecha =  $año . '-' . $mes . '-' . $dia;
      $fecha = date('Y-m-d', strtotime( $fecha));
      $matricula = remove_junk($db->escape($_POST['matricula']));
      $nombre   = remove_junk($db->escape($_POST['nombre']));
      $primerAp   = remove_junk($db->escape($_POST['ApellidoAp']));
      $SegundoAp   = remove_junk($db->escape($_POST['ApellidoAm']));
      $email   = remove_junk($db->escape($_POST['email']));
      $semestre   = remove_junk($db->escape($_POST['semestre']));
      $licenciatura   = $db->escape($_POST['licenciatura']);
      $activo   = $db->escape($_POST['activo']);
      $query = "INSERT INTO alumnos (";
      $query .= "matricula,Nombre,primerAp,SegundoAp,fecha_nacimiento,email,activo,Semestre,Licenciatura";
      $query .= ") VALUES (";
      $query .= " '{$matricula}','{$nombre}','{$primerAp}','{$SegundoAp}','{$fecha}','{$email}','{$activo}','{$semestre}','{$licenciatura}'";
      $query .= ")";
      if ($db->query($query)) {
        //sucess
        $password = sha1($email);
        $user_level = 3;
        $status = 1;
        $query2 = "INSERT INTO users (";
        $query2 .= "name,username,password,user_level,status";
        $query2 .= ") VALUES (";
        $query2 .= " '{$nombre}', '{$matricula}', '{$password}', '{$user_level}','1'";
        $query2 .= ")";
        if ($db->query($query2)) {
          //sucess
          $session->msg('s', " Se agrego correctamente el Alumno");
          redirect('add_alumnos.php', false);
        } else {
          //failed
          $session->msg('d', ' No se pudo Agregar Alumno.');
          redirect('add_alumnos.php', false);
        }
        redirect('add_alumnos.php', false);
      } else {
        //failed
        $session->msg('d', ' No se pudo Agregar Alumno.');
        redirect('add_alumnos.php', false);
      }
    }
  } else {
    $session->msg("d", $errors);
    redirect('add_alumnos.php', false);
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
        <span>Agregar Estudiante</span>
      </strong>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post" action="add_alumnos.php">
          <div class="form-group">
            <label for="matricua">Matrícula</label>
            <input type="text" class="form-control" name="matricula" placeholder="Matricula" required>
          </div>
          <div class="form-group">
            <label for="name">Nombre(s)</label>
            <input type="text" class="form-control" name="nombre" placeholder="Brenda Soledad" required>
          </div>
          <div class="form-group">
            <label for="apellidoAp">Apellido Paterno</label>
            <input type="text" class="form-control" name="ApellidoAp" placeholder="Pinedo">
          </div>
          <div class="form-group">
            <label for="apellidoAm">Apellido Materno</label>
            <input type="text" class="form-control" name="ApellidoAm" placeholder="De los Santos">
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
          <div class="form-group">
            <label for="semestre">Semestre</label>
            <select class="form-control" name="semestre">
              <option value="0">Seleccione:</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>

          <div class="form-group">
            <label for="name">Correo Electronico</label>
            <input type="email" class="form-control" name="email" placeholder="e-mail">
          </div>
          <div class="form-group">
            <label for="licenciatura">Licenciatura</label>
            <select class="form-control" name="licenciatura">
              <option value="0">Seleccione:</option>
              <?php foreach ($groups as $group) : ?>
                <option value="<?php echo $group['claveLic']; ?>"><?php echo ucwords($group['nombre']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="level">Estado</label>
            <select class="form-control" name="activo">
              <option value="0">Seleccione:</option>
              <option>Activo</option>
              <option>Inactivo</option>
            </select>
          </div>
          <div class="form-group clearfix">
            <button type="submit" name="add_alumnos" class="btn btn-primary">Guardar</button>
            <a href="alumnos.php" class="btn btn-default btn-danger">Cancelar</a>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>

<?php include_once('layouts/footer.php'); ?>