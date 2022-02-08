<?php 
session_start();
require("../db.php");
include_once("./templates/top.php");
include_once("./templates/navbar.php");

$id = $_GET['id'];

$sql = "SELECT u.*, r.roles as role_name, c.category_name, r.id FROM tbl_user u JOIN tbl_roles r ON r.id = u.roles 
        LEFT JOIN tbl_category c ON u.vendorCat = c.id
        WHERE u.id = '".$id."'";

$result = mysqli_query($conn, $sql);


?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-12">
      		<h2 style="float:left">User Detail</h2>
            <a href="index.php" class="btn btn-primary" style="float:right">Back</a>
      	</div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="dataTable">
         <?php while($roww = mysqli_fetch_array($result)) { ?>
          <tr>
              <td>Full Name</td>
              <td><?php echo $roww['name'] ?></td>
          </tr>
          <tr>
              <td>Email</td>
              <td><?php echo $roww['email'] ?></td>
          </tr>
          <tr>
              <td>Role</td>
              <td><?php echo $roww['role_name'] ?></td>
          </tr>
          <tr>
              <td>CNIC</td>
              <td><?php echo $roww['cnic'] ?></td>
          </tr>
          <tr>
              <td>Location</td>
              <td><?php echo $roww['locations'] ?></td>
          </tr>
          <tr>
              <td>Address</td>
              <td><?php echo $roww['address'] ?></td>
          </tr>
          <tr>
              <td>Phone Number</td>
              <td><?php echo $roww['phone'] ?></td>
          </tr>
          <?php if($roww['category_name'] != null){ ?>
          <tr>
              <td>Vendor Category</td>
              <td><?php echo $roww['category_name'] ?></td>
          </tr>
          <?php } ?>
          <?php } ?>
        </table>
      </div>
    </main>
  </div>
</div>




<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>