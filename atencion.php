<?php
$page_title = 'Agregar Atención';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
//$groups = find_all('user_groups');
?>
<?php
if (isset($_POST['add_atencion'])) {
    if (empty($errors)) {

        $atencion   = remove_junk($db->escape($_POST['atencion']));

        $query = "Update habilidad SET ";
        $query .= "atencion='{$atencion}' ";
        $query .= "Where id='{$_GET['id']}'";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', " Se Agregó correctamente la Atención " );
            redirect('atencion.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        } else {
            //failed
            $session->msg('d', ' No Se Agregó correctamente la Atención ' );
            redirect('atencion.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('atencion.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
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
                <span>Agregar Atención</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="atencion.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $_GET['id']; ?>">
                    <div class="form-group">
                        <label for="atencion">Atención</label>
                        <textarea type="text" class="form-control" name="atencion" placeholder="Atención" required></textarea>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="add_atencion" class="btn btn-primary">Guardar</button>
                        <a href="Retroalimentacion.php?user=<?php echo $_GET['user']; ?>" class="btn btn-default btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>