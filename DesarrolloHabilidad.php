<?php
$page_title = 'Desarrollo de Habilidades';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
?>
<?php include_once('layouts/header.php');  ?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<div class="row">
  <div class="col-md">
    <a href="EvaluacionClase.php?user=<?php echo $_GET['user']; ?>" class="btn btn-primary">Evaluación de Clases</a>
  
    <a href="Retroalimentacion.php?user=<?php echo $_GET['user']; ?>" class="btn btn-success">Retroalimentación</a>
  
    <a href="Reflexion.php?user=<?php echo $_GET['user']; ?>" class="btn btn-warning">Reflexión de la Práctica</a>
  </div>
</div>
</br>
</br>
<div class="row">
<center>
      <img style="width: 50%; height: 50%;" src="Logo.png">
    </center>
</div>

<?php include_once('layouts/footer.php'); ?>