<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
  $delete_id = delete_by_protocolo('inducion',$_GET['id'],$_GET['activo']);
  if($delete_id){
      $session->msg("s","Protocolo Modificado");
      redirect('protocolo.php?user='.$_GET['user']);
  } else {
      $session->msg("d","Se ha producido un error en la Modificación del Protocolo");
      redirect('protocolo.php?user='.$_GET['user']);
  }
?>
