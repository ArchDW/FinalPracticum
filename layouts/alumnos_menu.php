<ul>
  <li>
    <a href="asesorados.php?user=<?php echo $_GET['user']; ?>">
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
      <li><a href="PlanAccionTutorial_alumno.php?user=<?php echo $_GET['user']; ?>">Plan de Acción Tutorial</a> </li>
      <li><a href="sesiones_alumnos.php?user=<?php echo $_GET['user']; ?>">Sesiones</a> </li>
    </ul>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Tutoría Profesional</span>
    </a>
    <ul class="nav submenu">
      <li><a href="diagnostico_alumno.php?user=<?php echo $_GET['user']; ?>">Diagnostico</a></li>
      <li><a href="EvaluacionClase_alumno.php?user=<?php echo $_GET['user']; ?>">Evaluación de la Clase</a></li>
      <li><a href="Retroalimentacion_alumno.php?user=<?php echo $_GET['user']; ?>">Retroalimentación</a></li>
      <li><a href="Reflexion_alumno.php?user=<?php echo $_GET['user']; ?>">Reflexión</a></li>
      <li><a href="biblioteca_tut_pro_alumnos.php?user=<?php echo $_GET['user']; ?>">Biblioteca</a></li>
   </ul>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Aesosoria de Titulación</span>
    </a>
    <ul class="nav submenu">
    <li><a href="induccion.php?user=<?php echo $_GET['user']; ?>">Inducción</a></li>
      <li><a href="desarrollo_alumno.php?user=<?php echo $_GET['user']; ?>">Desarrollo</a></li>
      <li><a href="EvaluacionFInal_alumno.php?user=<?php echo $_GET['user']; ?>">Evalucaión Final del Documento</a> </li>
      <li><a href="biblioteca_ase_tit_alumnos.php?user=<?php echo $_GET['user']; ?>">Biblioteca</a> </li>
    </ul>
  </li>

</ul>