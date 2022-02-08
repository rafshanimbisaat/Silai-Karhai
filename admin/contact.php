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
$sql = "SELECT * from tbl_contact_us";
$result = mysqli_query($conn, $sql); 

?>

<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
<br><br>
      <h2>Contact Information</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Message</th>
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
              <td><?php echo $roww["subject"] ?></td>
              <td><?php echo $roww["message"] ?></td>
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
