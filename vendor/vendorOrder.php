<?php session_start(); 
require("../db.php");
include("../admin/templates/top.php"); 
include("../admin/templates/navbar-v.php");

// $sql = "SELECT * FROM tbl_order WHERE vendor_id='".$_SESSION['login']['id']."'";
// $query = mysqli_query($conn, $sql);

$sql_pen = "SELECT *, CASE status
WHEN 0 THEN 'Pending'
WHEN 1 THEN 'Approved'
WHEN 2 THEN 'Delivered'
END AS 'status',
CASE rider_status
WHEN 0 THEN 'Pending'
WHEN 1 THEN 'Picked'
WHEN 2 THEN 'Delivered'
END AS 'rider_status' FROM tbl_order WHERE status='0' AND vendor_id='".$_SESSION['login']['id']."'";
$query_pen = mysqli_query($conn, $sql_pen);

$sql_del = "SELECT *, CASE status
WHEN 0 THEN 'Pending'
WHEN 1 THEN 'Approved'
WHEN 2 THEN 'Delivered'
END AS 'status',
CASE rider_status
WHEN 0 THEN 'Pending'
WHEN 1 THEN 'Picked'
WHEN 2 THEN 'Delivered'
END AS 'rider_status' FROM tbl_order WHERE status='2' AND vendor_id='".$_SESSION['login']['id']."'";
$query_del = mysqli_query($conn, $sql_del);

$sql_can = "SELECT *, CASE status
WHEN 0 THEN 'Pending'
WHEN 1 THEN 'Approved'
WHEN 2 THEN 'Delivered'
END AS 'status',
CASE rider_status
WHEN 0 THEN 'Pending'
WHEN 1 THEN 'Picked'
WHEN 2 THEN 'Delivered'
END AS 'rider_status' FROM tbl_order WHERE status='1' AND vendor_id='".$_SESSION['login']['id']."'";
$query_can = mysqli_query($conn, $sql_can);

if ( isset($_POST['update']) ) {
  $status = $_POST["status"];
  $ID = $_POST['update_id'];

  $query1 = "update tbl_order set status='$status' where id = '$ID'";
  $res = mysqli_query($conn,$query1);

  if($res) {
      if(status == 1){
    $to      =  $email;
    $subject = 'Order Cancelled';
    $message = 'Your order has been cancelled by vendor. Due to Wrong or False Information.';
    $headers = 'From: info@silaikarai.com';

    mail($to, $subject, $message, $headers);
   }
   if(status == 2){
    $to      =  $email;
    $subject = 'Order Ready';
    $message = 'Your order is ready by Vendor. and waiting for rider to pick it up';
    $headers = 'From: info@silaikarai.com';

    mail($to, $subject, $message, $headers);
   }
   
?>
<script>
        swal("Order Status Updated Successfully").then(okay => {
        if (okay) {
            window.location.href = "vendorOrder.php";
        }
        });
    </script>
    <?php
  }
  else {
      echo "Error while update order!";
      
  }
}

?>
<style>
  .status-1{
    height: 100%;
    width: 200px;
  }
  .allign123{
    text-align: center;
  }
   [data-tab-content] {
    display: none;
  }
  .active[data-tab-content] {
    display: block;
  }
  .navbar.bg-dark {
    background-color: #de771c!important;
}
.sidebar .nav-link {
    font-weight: 500;
    color: #ffffff;
}
</style>
<div class="container-fluid">
  <div class="row">
    
    <?php include "../admin/templates/sidebar.php"; ?>
<br><br>
      <div class="row">
      	<div class="col-10">
      		<h2>Your Orders</h2>
      	</div>
      </div>
       <div class="row">
        <div class="col-10 mt-5">
          <a data-tab-target="#pending" style="float:right; margin-top:-45px; margin-right: -80px; color:white; cursor:pointer" class="btn btn-primary">Pending</a>
          <a data-tab-target="#delivered" style="float:right; margin-top:-45px; margin-right: -182px; color:white; cursor:pointer" class="btn btn-primary">Delivered</a>
          <a data-tab-target="#approved" style="float:right; margin-top:-45px; margin-right:13px; color:white; cursor:pointer" class="btn btn-primary">Approved</a> 
        </div>
      </div>
      <div class="table-responsive active" id="pending" data-tab-content>
      <table class="table table-striped table-sm allign123" id="dataTable">
          <thead>
            <tr>
              <th>Order #</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Gender</th>
              <th>City</th>
              <th>Total Price</th>
              <th>Payment Method</th>
              <th>Status</th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_array($query_pen)) {?>
              <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['full_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['total_price'] ?></td>
                <td><?php echo $row['payment_method'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                  <form action="" method="POST">
                <input type="hidden" name="update_id" value="<?php echo $row["id"]; ?>">
                <div class="col-md-12">
                    <select style="display: inline;" name="status" id="status" class="form-control col-md-6" required>
                      <option value="">Status</option>
                      <option value="0">Pending</option>
                      <option value="1">Approved</option>
                      <option value="2">Delivered</option>
                    </select>
                    <button name="update" class="btn btn-primary btn-sm ml-2" type="submit">Update</button>
                  </div>
                  
                </form>
                </td>
                <td><?php echo $row['rider_status'] ?></td>
                <td>
                  <a href="preview-measurement.php?id=<?php echo $row['id'] ?>&gender=<?php echo $row['gender'] ?>" class="btn btn-primary btn-sm" >Measurement</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

         <div class="table-responsive" id="delivered" data-tab-content>
      <table class="table table-striped table-sm allign123" id="dataTable1">
          <thead>
            <tr>
              <th>Order #</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Gender</th>
              <th>City</th>
              <th>Total Price</th>
              <th>Payment Method</th>
              <th>Status</th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_array($query_del)) {?>
              <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['full_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['total_price'] ?></td>
                <td><?php echo $row['payment_method'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                  <form action="" method="POST">
                <input type="hidden" name="update_id" value="<?php echo $row["id"]; ?>">
                <div class="status-1">
                    <select style="display: inline;" name="status" id="status" class="form-control col-md-6" required>
                      <option value="">Status</option>
                      <option value="0">Pending</option>
                      <option value="1">Approved</option>
                      <option value="2">Delivered</option>
                    </select>
                    <button name="update" class="btn btn-primary btn-sm ml-2" type="submit">Update</button>
                  </div>
                  
                </form>
                </td>
                <td>
                  <a href="preview-measurement.php?id=<?php echo $row['id'] ?>&gender=<?php echo $row['gender'] ?>" class="btn btn-primary btn-sm" >Measurement</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

         <div class="table-responsive" id="approved" data-tab-content>
      <table class="table table-striped table-sm allign123" id="dataTable2">
            <thead>
            <tr>
              <th>Order #</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Gender</th>
              <th>City</th>
              <th>Total Price</th>
              <th>Payment Method</th>
              <th>Status</th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
          </thead>
           <tbody>
            <?php while($row = mysqli_fetch_array($query_can)) {?>
              <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['full_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['total_price'] ?></td>
                <td><?php echo $row['payment_method'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                  <form action="" method="POST">
                <input type="hidden" name="update_id" value="<?php echo $row["id"]; ?>">
                <div class="status-1">
                    <select style="display: inline;" name="status" id="status" class="form-control col-md-6" required>
                      <option value="">Status</option>
                      <option value="0">Pending</option>
                      <option value="1">Approved</option>
                      <option value="2">Delivered</option>
                    </select>
                    <button name="update" class="btn btn-primary btn-sm ml-2" type="submit">Update</button>
                  </div>
                  
                </form>
                </td>
                <td>
                  <a href="preview-measurement.php?id=<?php echo $row['id'] ?>&gender=<?php echo $row['gender'] ?>" class="btn btn-primary btn-sm" >Measurement</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

        <script>
            const tabs = document.querySelectorAll('[data-tab-target]')
            const tabContents = document.querySelectorAll('[data-tab-content]')

            tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = document.querySelector(tab.dataset.tabTarget)
                tabContents.forEach(tabContent => {
                tabContent.classList.remove('active')
                })
                tabs.forEach(tab => {
                tab.classList.remove('active')
                })
                tab.classList.add('active')
                target.classList.add('active')
            })
            })
        </script>
    </main>
  </div>
</div>



<?php include("../admin/templates/footer.php"); ?>
<script type="text/javascript" src="./js/customers.js"></script>