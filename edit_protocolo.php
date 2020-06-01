<?php
  require_once('includes/load.php');
?>
<?php
    if($_GET['mod']==1){
        redirect('InformePractica.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
    }else if($_GET['mod']==2){
        redirect('Portafolio.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
    }else if($_GET['mod']==3){
        redirect('Tesis.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
    }
?>