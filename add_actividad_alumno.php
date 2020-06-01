<?php
$page_title = 'Editar Cuenta';
require_once('includes/load.php');
?>
<?php
//update user image
if (isset($_POST['submit'])) {
  $photo = new Archivos();
  $user_id = (int) $_POST['user_id'];
  $photo->upload($_FILES['file_upload']);
  if ($photo->process_user($user_id,$_GET['user'])) {
    $session->msg('s', 'La foto fue subida al servidor.');
    redirect('add_biblioteca.php?user=' . $_GET['user']);
  } else {
    $session->msg('d', join($photo->errors));
    redirect('add_biblioteca.php?user=' . $_GET['user']);
  }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-6">
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
                <input type="file" name="file_upload" multiple="multiple" class="btn btn-default btn-file" />
              </div>
              <div class="form-group">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                <button type="submit" name="submit" class="btn btn-info">Aceptar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>