<?php 
  session_start(); 
  // if(!$_SESSION['login']['email']){
  //   ?>
  //   <script>
  //     window.location.href = "login.php"
  //   </script>
  //   <?php
  // }
  require("../db.php");
  include_once("../admin/templates/top.php"); 
  include_once("../admin/templates/navbar-r.php"); 

 $sql_view = "SELECT *,
        CASE rider_status
        WHEN 0 THEN 'Pending'
        WHEN 1 THEN 'Picked'
        WHEN 2 THEN 'Delivered'
        END AS 'rider_status',
    CASE status
    WHEN 0 THEN 'Pending'
    WHEN 1 THEN 'Cancelled'
    WHEN 2 THEN 'Delivered'
     END AS 'status'
         FROM tbl_order WHERE rider_status='2' AND status='2' AND rider_id='".$_SESSION['login']['id']."'";
$query_view = mysqli_query($conn, $sql_view);


?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "../admin/templates/sidebar.php"; ?>
<BR><BR>
      <div class="row">
      	<div class="col-10">
      		<h2>Completed Orders List</h2>
      	</div>
      </div>
      
      <div class="table-responsive">
      <table class="table table-striped table-sm allign123" id="dataTable">
          <thead>
            <tr>
              <th>Order #</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>State</th>
              <th>City</th>
              <th>Zip</th>
              <th>Order Date</th>
              <th>Vendor Status</th>
              <th>Rider Status</th>
             <!--  <th>Update Status</th> -->
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_array($query_view)) {?>
              <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['full_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['state'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['zip'] ?></td>
                <td><?php echo $row['order_date'] ?></td>
                <td><?php echo $row['status'] ?></td>
                 <td><?php echo $row['rider_status'] ?></td>
              <!--   <td>
                  <form action="" method="POST">
                <input type="hidden" name="update_id" value="<?php echo $row["id"]; ?>">
                <div class="col-md-12">
                    <select style="display: inline;" name="rider_status" id="rider_status" class="form-control col-md-6" required>
                      <option value="">Status</option>
                      <option value="0">Pending</option>
                      <option value="1">Picked</option>
                      <option value="2">Delivered</option>
                    </select>
                    <button name="update" class="btn btn-primary btn-sm ml-2" type="submit">Update</button>
                  </div>
                  
                </form>
                </td> -->
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


<?php include_once("../admin/templates/footer.php"); ?>