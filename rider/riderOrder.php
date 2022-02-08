<?php session_start(); 
require("../db.php");
include("../admin/templates/top.php"); 
include("../admin/templates/navbar-r.php");

$sql_pen = "SELECT *,
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
         FROM tbl_order WHERE rider_status='0' AND status='2' AND rider_id='".$_SESSION['login']['id']."'";
$query_pen = mysqli_query($conn, $sql_pen);


$sql_pic = "SELECT *,
        CASE rider_status
        WHEN 0 THEN 'Pending'
        WHEN 1 THEN 'Picked'
        WHEN 2 THEN 'Delivered'
        END AS 'rider_status',
        CASE status
		WHEN 0 THEN 'Pending'
		WHEN 1 THEN 'Cancelled'
		WHEN 2 THEN 'Delivered' 
		END AS 'status' FROM tbl_order WHERE rider_status='1' AND status='2' AND rider_id='".$_SESSION['login']['id']."'";
$query_pic = mysqli_query($conn, $sql_pic);

$sql_del = "SELECT *,
        CASE rider_status
        WHEN 0 THEN 'Pending'
        WHEN 1 THEN 'Picked'
        WHEN 2 THEN 'Delivered'
        END AS 'rider_status',
        CASE status
		WHEN 0 THEN 'Pending'
		WHEN 1 THEN 'Cancelled'
		WHEN 2 THEN 'Delivered' 
		END AS 'status' FROM tbl_order WHERE rider_status='2' AND status='2' AND rider_id='".$_SESSION['login']['id']."'";
$query_del = mysqli_query($conn, $sql_del);

if ( isset($_POST['update']) ) {
  $status = $_POST["rider_status"];
  $ID = $_POST['update_id'];

  $query1 = "update tbl_order set rider_status='$status' where id = '$ID'";
  $res = mysqli_query($conn,$query1);

  if($res) {
?>
<script>
        swal("Rider Status Updated Successfully").then(okay => {
        if (okay) {
            window.location.href = "riderOrder.php";
        }
        });
    </script>
    <?php
  }
  else {
      echo "Error while updating!";
      
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
<BR><BR>
      <div class="row">
      	<div class="col-10">
      		<h2>Your Orders</h2>
      	</div>
      </div>
      <div class="row"></div>
      <div class="row">
        <div class="col-10 mt-5">
          <a data-tab-target="#pending" style="float:right; margin-top:-45px; margin-right: -80px; color:white; cursor:pointer" class="btn btn-primary">Pending</a>
          <a data-tab-target="#delivered" style="float:right; margin-top:-45px; margin-right: -182px; color:white; cursor:pointer" class="btn btn-primary">Delivered</a>
          <a data-tab-target="#picked" style="float:right; margin-top:-45px; margin-right:13px; color:white; cursor:pointer" class="btn btn-primary">Picked</a> 
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
              <th>State</th>
              <th>City</th>
              <th>Zip</th>
              <th>Order Date</th>
              <th>Vendor Status</th>
              <th>Rider Status</th>
              <th>Update Status</th>
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
                <td><?php echo $row['state'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['zip'] ?></td>
                <td><?php echo $row['order_date'] ?></td>
                <td><?php echo $row['status'] ?></td>
                 <td><?php echo $row['rider_status'] ?></td>
                <td>
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
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="table-responsive" id="picked" data-tab-content>
      <table class="table table-striped table-sm allign123" id="dataTable1">
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
              <th>Delivery Status</th>
              <th>Rider Status</th>
              <th>Update Status</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_array($query_pic)) {?>
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
                <td>
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
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="table-responsive" id="delivered" data-tab-content>
      <table class="table table-striped table-sm allign123" id="dataTable2">
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
              <th>Delivery Status</th>
              <th>Rider Status</th>
              <th>Update Status</th>
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
                <td><?php echo $row['state'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['zip'] ?></td>
                <td><?php echo $row['order_date'] ?></td>
                <td><?php echo $row['status'] ?></td>
                 <td><?php echo $row['rider_status'] ?></td>

                <td>
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