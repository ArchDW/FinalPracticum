<?php
$page_title = 'Subir Actividad';
require_once('includes/load.php');
?>
<?php
//update user image
if (isset($_POST['submit'])) {
    $photo = new Archivo();
    $id = (int) $_POST['user_id'];
    $photo->upload($_FILES['file_upload']);
    if ($photo->process_user($id)) {
        $session->msg('s', 'El achvo fue subido al servidor.');
        redirect('subir_actividad.php?user=' . $_GET['user'] . '&id=' . $_GET['id']);
    } else {
        $session->msg('d', join($photo->errors));
        redirect('subir_actividad.php?user=' . $_GET['user'] . '&id=' . $_GET['id']);
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
                    <span class="glyphicon glyphicon-file"></span>
                    <span>Subir Archivo</span>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <form class="form" action="subir_actividad.php?user=<?php echo $_GET['user'] ?>&id=<?php echo $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="file_upload" multiple="multiple" class="btn btn-default btn-file" />
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>">
                                <button type="submit" name="submit" class="btn btn-warning">Subir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>