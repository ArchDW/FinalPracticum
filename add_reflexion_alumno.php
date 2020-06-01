<?php
$page_title = 'Reflexión de la Práctica';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
//Update User basic info
  if(isset($_POST['update'])) {
    //$req_fields = array('name','username','level');
    //validate_fields($req_fields);
    if(empty($errors)){
      $id = $_GET['id'];
      $reflexion = remove_junk($db->escape($_POST['reflexion']));
      $sql = "UPDATE habilidad SET  reflexion='{$reflexion}' WHERE id='{$id}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Updated ");
            redirect('add_reflexion_alumno.php?id='.$_GET['id'].'&user='.$_GET['user'], false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('add_reflexion_alumno.php?id='.$_GET['id'].'&user='.$_GET['user'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('add_reflexion_alumno.php?id='.$_GET['id'].'&user='.$_GET['user'],false);
    }
  }
?>

<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">  </div>
       <div class="panel-body">
          <form method="post" action="add_reflexion_alumno.php?id=<?php echo $_GET['id']; ?>&user=<?php echo $_GET['user']; ?>" class="clearfix">
            <div class="form-group">
                <label for="reflexion">Reflexión</label>
                <input required type="text" class="form-control" name="reflexion" >
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Aceptar</button>
                    <a href="Reflexion_alumno.php?user=<?php echo $_GET['user']; ?>" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
       </div>
     </div>
  </div>

 </div>
<?php include_once('layouts/footer.php'); ?>