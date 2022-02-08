<?php 
session_start();
require("../db.php");
include_once("./templates/top.php");
include_once("./templates/navbar.php");

$id = $_GET['id'];

$sql = "SELECT o.*, p.product_name, p.id FROM tbl_order_detail o JOIN tbl_product p ON p.id = o.product_id
        WHERE o.order_id = '".$id."'";

$result = mysqli_query($conn, $sql);

$sql2 = "SELECT o.*, u.name, u.id FROM tbl_order o JOIN tbl_user u ON u.id = o.vendor_id
        WHERE o.id = '".$id."'";
$result2 = mysqli_query($conn, $sql2);


?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>
<br><br>
      <div class="row">
      	<div class="col-12">
      		<h2 style="float:left">Order Detail</h2>
            <a href="customer_orders.php" class="btn btn-primary" style="float:right">Back</a>
            
      	</div>
      </div>
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_array($result)){ ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['product_name'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td><?php echo $row['price'] ?></td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
        <h2 class="mt-4">Customer Detail</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="dataTable">
         <?php while($roww = mysqli_fetch_array($result2)) { ?>
          <tr>
              <td>Full Name</td>
              <td><?php echo $roww['full_name'] ?></td>
          </tr>
          <tr>
              <td>Email</td>
              <td><?php echo $roww['email'] ?></td>
          </tr>
          <tr>
              <td>Phone Number</td>
              <td><?php echo $roww['phone'] ?></td>
          </tr>
          <tr>
              <td>Address</td>
              <td><?php echo $roww['address'] ?></td>
          </tr>
          <tr>
              <td>Location</td>
              <td><?php echo $roww['location'] ?></td>
          </tr>
          <tr>
              <td>City</td>
              <td><?php echo $roww['city'] ?></td>
          </tr>
          <tr>
              <td>State</td>
              <td><?php echo $roww['state'] ?></td>
          </tr>
          <tr>
              <td>Zip</td>
              <td><?php echo $roww['zip'] ?></td>
          </tr>
          <tr>
              <td>Payment Method</td>
              <td><?php echo $roww['payment_method'] ?></td>
          </tr>
          <tr>
              <td>Total Price</td>
              <td><?php echo $roww['total_price'] ?></td>
          </tr>
          <tr>
              <td>Vendor Name</td>
              <td><?php echo $roww['name'] ?></td>
          </tr>
          <?php } ?>
        </table>
      </div>
    </main>
  </div>
</div>




<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>