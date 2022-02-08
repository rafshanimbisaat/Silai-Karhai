<?php 
session_start();
require("../db.php");
include_once("./templates/top.php");
include_once("./templates/navbar.php");

$sql = "SELECT id, full_name, gender, email, total_price, CASE status
WHEN 0 THEN 'Pending'
WHEN 1 THEN 'Cancelled'
WHEN 2 THEN 'Delivered'
END AS 'status' FROM tbl_order WHERE status='0'";
$query = mysqli_query($conn, $sql);

$sql_del = "SELECT id, full_name, gender, email, total_price, CASE status
WHEN 0 THEN 'Pending'
WHEN 1 THEN 'Cancelled'
WHEN 2 THEN 'Delivered'
END AS 'status' FROM tbl_order WHERE status='2'";
$query_del = mysqli_query($conn, $sql_del);

$sql_can = "SELECT id, full_name, gender, email, total_price, CASE status
WHEN 0 THEN 'Pending'
WHEN 1 THEN 'Cancelled'
WHEN 2 THEN 'Delivered'
END AS 'status' FROM tbl_order WHERE status='1'";
$query_can = mysqli_query($conn, $sql_can);

if ( isset($_POST['update']) ) {
  $status = $_POST["status"];
  $ID = $_POST['update_id'];

  $query1 = "update tbl_order set status='$status' where id = '$ID'";
  $res = mysqli_query($conn,$query1);

  if($res) {
    ?>
    <script>
        swal("Order Status Updated Successfully").then(okay => {
        if (okay) {
            window.location.href = "customer_orders.php";
        }
        });
    </script>
    <?php
  }
  else {
      echo "Error while update user!";
      
  }
}


?>
<style>
  [data-tab-content] {
    display: none;
  }
  .active[data-tab-content] {
    display: block;
  }
</style>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>
<br><br>
<h2>Orders</h2>
      <div class="row">
      	<div class="col-10 mt-5">
          <a data-tab-target="#pending" style="float:right; margin-top:-45px; margin-right: -80px; color:white; cursor:pointer" class="btn btn-primary">Pending</a>
          <a data-tab-target="#delivered" style="float:right; margin-top:-45px; margin-right: -182px; color:white; cursor:pointer" class="btn btn-primary">Delivered</a>
          <a data-tab-target="#cancelled" style="float:right; margin-top:-45px; margin-right:13px; color:white; cursor:pointer" class="btn btn-primary">Cancelled</a> 
      	</div>
      </div>
      
      <div class="table-responsive active" id="pending" data-tab-content>
        <table class="table table-striped table-sm" id="dataTable">
          <thead class="text-center">
            <tr>
              <th>Order #</th>
              <th>Name</th>
              <th>Email</th>
              <th>Total Price</th>
              <th>Status</th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php while($row = mysqli_fetch_array($query)) {?>
              <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['full_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['total_price'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                <form action="" method="POST">
                <input type="hidden" name="update_id" value="<?php echo $row["id"]; ?>">
                <div class="col-md-12">
                    <select style="display: inline;" name="status" id="status" class="form-control col-md-6" required>
                      <option value="">Status</option>
                      <option value="0">Pending</option>
                      <option value="1">Cancelled</option>
                      <option value="2">Delivered</option>
                    </select>
                    <button name="update" class="btn btn-primary btn-sm ml-2" type="submit">Update</button>
                  </div>
                  
                </form>
              </td>
                <td>
                  <a href="preview-order.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm" >Details</a>
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
        <table class="table table-striped table-sm" id="dataTable1">
          <thead class="text-center">
            <tr>
              <th>Order #</th>
              <th>Name</th>
              <th>Email</th>
              <th>Total Price</th>
              <th>Status</th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php while($row = mysqli_fetch_array($query_del)) {?>
              <tr >
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['full_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td style="width:100px;"><?php echo $row['total_price'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td style="width:200px;">
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
                <td style="width:200px;">
                  <a href="preview-order.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm" >Details</a>
                  <a href="preview-measurement.php?id=<?php echo $row['id'] ?>&gender=<?php echo $row['gender'] ?>" class="btn btn-primary btn-sm" >Measurement</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="table-responsive" id="cancelled" data-tab-content>
        <table class="table table-striped table-sm" id="dataTable2">
          <thead class="text-center">
            <tr>
              <th>Order #</th>
              <th>Name</th>
              <th>Email</th>
              <th>Total Price</th>
              <th>Status</th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php while($row = mysqli_fetch_array($query_can)) {?>
              <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['full_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td style="width:100px;"><?php echo $row['total_price'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td style="width:200px;">
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
                <td style="width:200px;">
                  <a href="preview-order.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm" >Details</a>
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




<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>