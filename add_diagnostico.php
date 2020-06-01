<?php
$page_title = 'Agregar Diagnostico';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
?>
<?php
if (isset($_POST['add_diagnostico'])) {
    if (empty($errors)) {
        
        $fortaleza = remove_junk($db->escape($_POST['fortaleza']));
        $debilidad = remove_junk($db->escape($_POST['debilidad']));
        $aspecto = remove_junk($db->escape($_POST['aspecto']));
        $estrategia = remove_junk($db->escape($_POST['estrategia']));
        $matricula = remove_junk($db->escape($_POST['matricula']));
        $estado = remove_junk($db->escape($_POST['estado']));
        $query = "INSERT INTO diagnosticos(";
        $query .= "fortaleza, debilidad, aspecto, estrategia, matricula, claveD, estado";
        $query .= ") VALUES (";
        $query .= " '{$fortaleza}', '{$debilidad}', '{$aspecto}', '{$estrategia}', '{$matricula}', '{$_GET['user']}', '{$estado}'";
        $query .= ")";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', " Se Agregó correctamente el diagnóstico");
            redirect('add_diagnostico.php?user=' . $_GET['user'], false);
        } else {
            //failed
            $session->msg('d', ' No se Agregó correctamente el diagnóstico');
            redirect('add_diagnostico.php?user=' . $_GET['user'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('add_diagnostico.php?user=' . $_GET['user'], false);
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
                <span>Ingresar Diagnóstico</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="add_diagnostico.php?user=<?php echo $_GET['user']; ?>">
                    <div class="form-group ">
                        <label for="fortaleza">Fortalizas</label>
                        <textarea class="form-control" name="fortaleza" placeholder="Habilidades más desarrolladas" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="debilidad">Debilidades</label>
                        <textarea class="form-control" name="debilidad" placeholder="Habilidades menos desarrolladas" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="aspecto">Habilidades en las que se enfocará la tutoría</label>
                        <textarea class="form-control" name="aspecto" placeholder="Puntualice las habilidades" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="estrategia">Estrategia para mejorar</label>
                        <textarea class="form-control" name="estrategia" placeholder="Puntualice las acciones " required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="debilidad">Matrícula</label>
                        <input class="form-control" type="number" name="matricula" placeholder="Matrícula del Estudiante" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Estado</label>
                        <select class="form-control" name="estado">
                            <option value="0">Activo</option>
                            <option value="1">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="add_diagnostico" class="btn btn-primary">Guardar</button>
                        <a href="diagnostico.php?user=<?php echo $_GET['user']; ?>" class="btn btn-default btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>