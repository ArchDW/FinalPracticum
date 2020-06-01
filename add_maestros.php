<?php
$page_title = 'Agregar Mestros';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_level(1);
//$groups = find_all('user_groups');
?>
<?php
if (isset($_POST['add_maestros'])) {

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
      $session->msg('d', ' No Se agrego correctamente el Docente');
      redirect('add_maestros.php?user=' . $_GET['user'], false);
    } else {
      $claveD = remove_junk($db->escape($_POST['claveD']));
      $nombre   = remove_junk($db->escape($_POST['nombre']));
      $primerAp   = remove_junk($db->escape($_POST['ApellidoAp']));
      $SegundoAp   = remove_junk($db->escape($_POST['ApellidoAm']));

      $email   = remove_junk($db->escape($_POST['email']));
      $GradoAc   = remove_junk($db->escape($_POST['GradoAc']));
      $activo   = $db->escape($_POST['activo']);

      $query = "INSERT INTO maestros (";
      $query .= "claveD,nombre,primerAp,SegundoAp,fecha_nacimiento,email,activo,GradoAc";
      $query .= ") VALUES (";
      $query .= " '{$claveD}', '{$nombre}', '{$primerAp}', '{$SegundoAp}','{$fecha}','{$email}','{$activo}','{$GradoAc}'";
      $query .= ")";
      if ($db->query($query)) {
        //sucess
        $session->msg('s', " Se agrego correctamente el Docente");
        $password = sha1($claveD);
        $user_level = 2;
        $status = 1;
        $query2 = "INSERT INTO users (";
        $query2 .= "name,username,password,user_level,status";
        $query2 .= ") VALUES (";
        $query2 .= " '{$nombre}', '{$email}', '{$password}', '{$user_level}','1'";
        $query2 .= ")";
        if ($db->query($query2)) {
          //sucess
          $session->msg('s', " Cuenta de usuario ha sido creada");
          redirect('add_maestros.php', false);
        } else {
          //failed
          $session->msg('d', ' No se pudo crear la cuenta.');
          redirect('add_maestros.php', false);
        }
      } else {
        //failed
        $session->msg('d', ' No se pudo Agregar el Docente.');
        redirect('add_maestros.php', false);
      }
    }
  } else {
    $session->msg("d", $errors);
    redirect('add_maestros.php', false);
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
        <span>Agregar Maestro</span>
      </strong>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post" action="add_maestros.php">
          <div class="form-group">
            <label for="claveD">Clave del Docente</label>
            <input type="text" class="form-control" name="claveD" placeholder="Ejem. D1" required>
          </div>
          <div class="form-group">
            <label for="name">Nombre(s)</label>
            <input type="text" class="form-control" name="nombre" placeholder="María Fernanda" required>
          </div>
          <div class="form-group">
            <label for="apellidoAp">Apellido Paterno</label>
            <input type="text" class="form-control" name="ApellidoAp" placeholder="Ruíz">
          </div>
          <div class="form-group">
            <label for="apellidoAm">Apellido Materno</label>
            <input type="text" class="form-control" name="ApellidoAm" placeholder="Ortega">
          </div>
          <div class="form-group">
            <label>Fecha de Nacimiento</label></br>
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
            <label for="name">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" placeholder="e-mail">
          </div>
          <div class="form-group">
            <label for="GradoAc">Grado Académico</label>
            <select class="form-control" name="GradoAc">
              <option value="null">Seleccione:</option>
              <option>Doctorado</option>
              <option>Maestría</option>
              <option>Licenciatura</option>
            </select>
          </div>
          <div class="form-group">
            <label for="level">Activo</label>
            <select class="form-control" name="activo">
              <option value="0">Seleccione:</option>
              <option>Activo</option>
              <option>Inactivo</option>
            </select>
          </div>
          <div class="form-group clearfix">
            <button type="submit" name="add_maestros" class="btn btn-primary">Guardar</button>
            <a href="maestros.php" class="btn btn-default btn-danger">Cancelar</a>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>

<?php include_once('layouts/footer.php'); ?>