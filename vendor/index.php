<?php session_start(); ?>
<?php 
require("../db.php");
include("../admin/templates/top.php"); 
?>
<?php include("../admin/templates/navbar-v.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "../admin/templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Welcome Vendor Panel</h2>
      	</div>
      </div>
      
    </main>
  </div>
</div>



<?php include("../admin/templates/footer.php"); ?>