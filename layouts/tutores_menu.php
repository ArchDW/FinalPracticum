<?php
$inducion = join_inducion_table($_GET['user']);
?>
<ul>
  <li>
    <a href="asesores.php?user=<?php echo $_GET['user']; ?>">
      <i class="glyphicon glyphicon-home"></i>
      <span>Panel de control</span>
    </a>
  </li>
  
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Tutoría Academica</span>
    </a>
    <ul class="nav submenu">
      <li><a href="PlanAccionTutorial.php?user=<?php echo $_GET['user']; ?>">Plan de Acción Tutorial</a> </li>
      <li><a href="sesiones.php?user=<?php echo $_GET['user']; ?>">Sesiones</a> </li>
      <li><a href="Portafolio.php?user=<?php echo $_GET['user']; ?>">Portafolio de Evidencias</a> </li>
      <li><a href="InformePractica.php?user=<?php echo $_GET['user']; ?>">Informe de Prácticas Profesionales</a> </li>
      <li><a href="Tesis.php?user=<?php echo $_GET['user']; ?>">Tesis de Investigación</a> </li>
   </ul>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Tutoría Profesional</span>
    </a>
    <ul class="nav submenu">
      <li><a href="diagnostico.php?user=<?php echo $_GET['user']; ?>">Diagnóstico</a></li>
      <li><a href="EvaluacionClase.php?user=<?php echo $_GET['user']; ?>">Evaluación de la Clase</a></li>
      <li><a href="Retroalimentacion.php?user=<?php echo $_GET['user']; ?>">Retroalimentación</a></li>
      <li><a href="Reflexion.php?user=<?php echo $_GET['user']; ?>">Reflexión</a></li>
      <li><a href="biblioteca_tut_pro.php?user=<?php echo $_GET['user']; ?>">Biblioteca</a></li>
   </ul>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Asesoría para</span></br>
      <i class=""></i>
      <span>la Titulación</span>
    </a>
    <ul class="nav submenu">
      <li><a href="protocolo.php?user=<?php echo $_GET['user']; ?>">Proyectos</a></li>
      <?php foreach ($inducion as $inducion ):?>
        <li><a href="desarrollo.php?user=<?php echo $_GET['user']; ?>&p=<?php echo ucwords($inducion['id']);?>" ><?php echo $inducion['matricula'];?> - <?php echo $inducion['nombre'];?></a></li>
      <?php endforeach;?>
      <li><a href="EvaluacionFInal.php?user=<?php echo $_GET['user']; ?>">Evaluación Final del </br>
      Trabajo de Titulación</a> </li>
      <li><a href="biblioteca_ase_tit.php?user=<?php echo $_GET['user']; ?>">Biblioteca</a> </li>
   </ul>
  </li>

</ul>