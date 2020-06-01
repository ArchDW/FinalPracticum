<?php
$page_title = 'Reflexión de la Práctica';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
$alumnos = join_habilidad_table($_GET['user']);
?>
<?php include_once('layouts/header.php');  ?>
<div class="row">
    <div class="col-md-12">
        <?php echo display_msg($msg); ?>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading clearfix">
            <div class="pull-right">
          <input class="form-control" type="text" id="caja_busqueda" placeholder="Busqueda">
        </div>
            </div>

            <div class="panel-body">
            <table class="table table-hover table-condensed table-bordered" id="iddatatable">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                        <tr>
                            <th class="text-center">Matrícula</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Día de la Clase</th>
                            <th class="text-center">Preguntas para orientar la reflexión</th>
                            <th class="text-center">Reflexión del Estudiante</th>
                            <th class="text-center">Agregar</th>
                        </tr>
                    </thead>
                    <tbody id="registros_usuarios">
                        <?php foreach ($alumnos as $alumnos) : ?>
                            <tr>
                                <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($alumnos['fecha']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($alumnos['preguntas']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($alumnos['refelxion']); ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="pregunta.php?id=<?php echo $alumnos['id']; ?>&user=<?php echo $_GET['user']; ?>" class="btn btn-success btn-xs" title="Preguntas de Orientación" data-toggle="tooltip">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php include_once('layouts/footer.php'); ?>