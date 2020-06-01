<?php
$page_title = 'Subir Archivo Biblioteca de Tutorias Profesionales';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
$alumnos = join_asesor2_table($_GET['user']);
?>
<?php
if (isset($_POST['submit'])) {
  if (empty($errors)) {
    if (is_uploaded_file($_FILES['file_upload']['tmp_name'])) {
      // creamos las variables para subir a la db
      $ruta =  'uploads/file';
      $nombrefinal = trim($_FILES['file_upload']['name']); //Eliminamos los espacios en blanco
      $nombrefinal = mb_ereg_replace(" ", "", $nombrefinal); //Sustituye una expresión regular
      $upload = $ruta . $nombrefinal;
      if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion 
        foreach ($_POST['matriculas'] as $matriculas) :
          $query = "INSERT INTO biblioteca_tut_pro(";
          $query .= "nombre, claveD, matricula";
          $query .= ") VALUES (";
          $query .= " '{$nombrefinal}', '{$_GET['user']}', '{$matriculas}'";
          $query .= ")";
          if ($db->query($query)) {
            //sucess
            $session->msg('s', " Se Agrego Correctamente el archivo");
          } else {
            //failed
            $session->msg('d', ' No Se agrego Correctamente el archivo');
            redirect('add_biblioteca.php?user=' . $_GET['user'], false);
          }
        endforeach;
        redirect('add_biblioteca.php?user=' . $_GET['user'], false);
      }else {
        $session->msg('d', ' No Se Subio Correctamente el archivo');
        redirect('add_biblioteca.php?user=' . $_GET['user'], false);
      }
    } else {
      $session->msg('d', ' No Hay archivo');
      redirect('add_biblioteca.php?user=' . $_GET['user'], false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('add_biblioteca.php?user=' . $_GET['user'], false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-heading clearfix">
          <span class="glyphicon glyphicon-save-file"></span>
          <span>Subir Archivo</span>
        </div>
      </div>
      <div class="panel-body">
        <div class="row">

          <div class="col-md-8">
            <form class="form" action="add_biblioteca.php?user=<?php echo $_GET['user'] ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="file_upload" class="btn btn-default btn-file" />
              </div>
              <div class="form-group">
                <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                  <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                    <tr>
                      <th class="text-center">Matricula</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Apellido Paterno</th>
                      <th class="text-center">Apellido Materno</th>
                      <th class="text-center">Licenciatura</th>
                      <th class="text-center">Semestre</th>
                      <th class="text-center">Selección</th>
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
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-info">Aceptar</button>
                <a href="biblioteca_tut_pro.php?user=<?php echo $_GET['user']; ?>" class="btn btn-default btn-danger">Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>