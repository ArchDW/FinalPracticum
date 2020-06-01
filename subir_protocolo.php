<?php
  require_once('includes/load.php');
  $session->msg('s', " Se agrego correctamente el Archivo");
  redirect('induccion.php?user=' . $_GET['user'], false);
?>