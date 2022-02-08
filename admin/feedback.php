<?php 
session_start();
if(!$_SESSION['login']['email']){
  ?>
  <script>
    window.location.href = "login.php"
  </script>
  <?php
}
require("../db.php");
include "./templates/top.php"; 

?>
 
<?php include "./templates/navbar.php"; ?>
<?php
$sql = "SELECT f.id, p.product_name, u.name, f.feedback, f.email FROM tbl_feedback f JOIN tbl_product p ON f.product = p.id JOIN tbl_user u ON u.id = f.vendor_name";
$result = mysqli_query($conn, $sql); 

?>

<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
<br><br>
      <h2>Vendor Feedback Information</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Vendor Name</th>
              <th>Email</th>
              <th>Product Name</th>
              <th>Feedback</th>
            </tr>
          </thead>
          <tbody>
          <?php
             while($roww = mysqli_fetch_array($result)){
          ?>
          <tr>
              <th scope="row"><?php echo $roww["id"] ?></th>
              <td><?php echo $roww["name"] ?></td>
              <td><?php echo $roww["email"] ?></td>
              <td><?php echo $roww["product_name"] ?></td>
              <td><?php echo $roww["feedback"] ?></td>
          </tr>
          <?php
             }
          ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include "./templates/footer.php"; ?>

<!-- <script type="text/javascript" src="./js/admin.js"></script> -->
