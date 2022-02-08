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
 
 <?php 
 include "./templates/navbar.php";
  ?>
<?php
$sql = "SELECT u.id, u.name, u.email, r.roles, CASE u.is_verified
WHEN 0 THEN 'Pending'
WHEN 1 THEN 'Approved'
WHEN 2 THEN 'Declined'
END AS 'status' FROM tbl_user u JOIN tbl_roles r ON u.roles = r.id";
// die($sql);
$result = mysqli_query($conn, $sql); 

if ( isset($_POST['update']) ) {
  $status = $_POST["status"];
  $ID = $_POST['update_id'];
  $email = $_POST['email'];

  $query1 = "update tbl_user set is_verified='$status' where id = '$ID'";
  $res = mysqli_query($conn,$query1);
  

  if($status == 1) {
    $to      =  $email;
    $subject = 'Account Verified';
    $message = 'Your account has been Verified by Admin. Now you can login and start your own business with us.';
    $headers = 'From: admin@silaikarai.com';

    mail($to, $subject, $message, $headers);
    echo 'Updated Successfully';
    header("location:index.php");
  }
  if($status == 2){
       $to      =  $email;
    $subject = 'Account Decline';
    $message = 'Your account has been Declined by Admin. False Information';
    $headers = 'From: admin@silaikarai.com';

    mail($to, $subject, $message, $headers);
    echo 'Updated Successfully';
    header("location:index.php");
  }
  if($status==0){
       echo 'Updated Successfully';
    header("location:index.php");
  }
  else {
      echo "Error while update user!";
      
  }
}

?>

<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
<br><br>
      <h2>Manage Users</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="dataTables">
          <thead>
            <tr class="text-center">
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Roles</th>
              <th>Status</th>
              <th>Action</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
          <?php
             while($roww = mysqli_fetch_array($result)){
          ?>
          <tr class="text-center">
              <th scope="row"><?php echo $roww["id"] ?></th>
              <td><?php echo $roww["name"] ?></td>
              <td><?php echo $roww["email"] ?></td>
              <td><?php echo $roww["roles"] ?></td>
              <td><?php echo $roww["status"] ?></td>
              <td style="width:700px">
                <form action="" method="POST">
                <input type="hidden" name="update_id" value="<?php echo $roww["id"]; ?>">
                <input type="hidden" name="email" value="<?php echo $roww["email"]; ?>">
                <div class="col-md-12">
                    <select style="display: inline;" name="status" id="status" class="form-control col-md-9" required>
                    <option value="">Status</option>
                      <option value="1">Approve</option>
                      <option value="2">Decline</option>
                    </select>
                    <button name="update" class="btn btn-primary btn-sm ml-2" type="submit">Update</button>
                  </div>
                  
                </form>
              </td>
              <td><a  href="preview-users.php?id=<?php echo $roww['id'] ?>" class="btn btn-primary btn-sm mt-2" >Details</a></td>
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
