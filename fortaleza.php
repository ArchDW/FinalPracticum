<?php
$page_title = 'Agregar Fortalezas';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
//$groups = find_all('user_groups');
?>
<?php
if (isset($_POST['add_fortaleza'])) {
    if (empty($errors)) {

        $fortaleza   = remove_junk($db->escape($_POST['fortaleza']));

        $query = "Update habilidad SET ";
        $query .= "fortaleza='{$fortaleza}' ";
        $query .= "Where id='{$_GET['id']}'";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', " Se Agregó correctamente la Fortaleza " );
            redirect('fortaleza.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        } else {
            //failed
            $session->msg('d', ' No Se Agregó correctamente la Fortaleza ' );
            redirect('fortaleza.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('fortaleza.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
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
                <span>Agregar Fortaleza</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="fortaleza.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $_GET['id']; ?>">
                    <div class="form-group">
                        <label for="observacion">Fortaleza</label>
                        <textarea type="text" class="form-control" name="fortaleza" placeholder="Fortaleza" required></textarea>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="add_fortaleza" class="btn btn-primary">Guardar</button>
                        <a href="Retroalimentacion.php?user=<?php echo $_GET['user']; ?>" class="btn btn-default btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>