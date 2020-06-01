<?php
$page_title = 'Agregar Preguntas';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
//$groups = find_all('user_groups');
?>
<?php
if (isset($_POST['add_pregunta'])) {
    if (empty($errors)) {

        $pregunta   = remove_junk($db->escape($_POST['pregunta']));

        $query = "Update habilidad SET ";
        $query .= "preguntas='{$pregunta}' ";
        $query .= "Where id='{$_GET['id']}'";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', " Se Agregó correctamente la Pregunta para orientar la Relfexión" );
            redirect('pregunta.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        } else {
            //failed
            $session->msg('d', ' No Se Agregó correctamente la Pregunta para orientar la Relfexión ' );
            redirect('pregunta.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('pregunta.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
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
                <span>Agregar Pregunta para orientar la reflexión</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="pregunta.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $_GET['id']; ?>">
                    <div class="form-group">
                        <label for="observacion">Pregunta para orientar la reflexión</label>
                        <input type="text" class="form-control" name="pregunta" placeholder="Pregunta para orientar la reflexión" required>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="add_pregunta" class="btn btn-primary">Guardar</button>
                        <a href="Reflexion.php?user=<?php echo $_GET['user']; ?>" class="btn btn-default btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>