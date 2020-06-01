<?php
  $page_title = 'Página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>

<?php include_once('layouts/header.php');  ?>
  <div class="row">
    <div class="col-md-6">
      <?php echo display_msg($msg); ?>
    </div>
    <div class="row">
      <div class="col-md-4">
       
      </div>
    </div>
  </div>
  <center>
    <img style="width: 50%; height: 50%;" src="Logo.png">
  </center>
<?php include_once('layouts/footer.php'); ?>
