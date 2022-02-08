<?php 
session_start();
require("../db.php");
include_once("./templates/top.php");
include_once("./templates/navbar.php");

$id = $_GET['id'];
$gender = $_GET['gender'];

if($gender == "Male"){
    $sql1 = "SELECT o.id, o.full_name, m.* FROM tbl_order o JOIN tbl_male_measurement m ON o.id = m.order_id
             WHERE o.id = '".$id."'";
    $result1 = mysqli_query($conn, $sql1);
}
else{
    $sql2 = "SELECT o.id, o.full_name, f.* FROM tbl_order o JOIN tbl_female_measurement f ON o.id = f.order_id
             WHERE o.id = '".$id."'";
    $result2 = mysqli_query($conn, $sql2);
}

?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-12">
      		<h2 style="float:left">Measurement Detail</h2>
            <a href="customer_orders.php" class="btn btn-primary" style="float:right">Back</a>
            
      	</div>
      </div>
      <div class="table-responsive">
        <?php if($gender == "Male") { ?>
        <table class="table table-striped table-sm" id="dataTable">
         <?php while($roww = mysqli_fetch_array($result1)) { ?>
          <tr>
              <td>FULL NAME:</td>
              <td><?php echo $roww['full_name'] ?></td>
          </tr>
          <tr>
              <td class="text-center" colspan="2">MEN’S SHIRT/TOP</td>
          </tr>
          <tr>
              <td>AROUND NECK:</td>
              <td><?php echo $roww['aroundNeck'] ?></td>
          </tr>
          <tr>
              <td>ACROSS SHOULDERS:</td>
              <td><?php echo $roww['aroundShoulder'] ?></td>
          </tr>
          <tr>
              <td>AROUND CHEST:</td>
              <td><?php echo $roww['aroundChest'] ?></td>
          </tr>
          <tr>
              <td>AROUND NAVEL:</td>
              <td><?php echo $roww['aroundNavel'] ?></td>
          </tr>
          <tr>
              <td>ARMHOLE:</td>
              <td><?php echo $roww['armHole'] ?></td>
          </tr>
          <tr>
              <td>BICEP:</td>
              <td><?php echo $roww['bicep'] ?></td>
          </tr>
          <tr>
              <td>SLEEVE LENGTH:</td>
              <td><?php echo $roww['sleeveLength'] ?></td>
          </tr>
          <tr>
              <td>AROUND WRIST:</td>
              <td><?php echo $roww['aroundWrist'] ?></td>
          </tr>
          <tr>
              <td>TOP LENGTH:</td>
              <td><?php echo $roww['topLength'] ?></td>
          </tr>
          <tr>
              <td class="text-center" colspan="2">MEN’S BOTTOM</td>
          </tr>
          <tr>
              <td>AROUND WAIST:</td>
              <td><?php echo $roww['aroundWaist'] ?></td>
          </tr>
          <tr>
              <td>AROUND HIP:</td>
              <td><?php echo $roww['aroundHip'] ?></td>
          </tr>
          <tr>
              <td>AROUND THIGH:</td>
              <td><?php echo $roww['aroundThigh'] ?></td>
          </tr>
          <tr>
              <td>AROUND KNEE:</td>
              <td><?php echo $roww['aroundKnee'] ?></td>
          </tr>
          <tr>
              <td>AROUND CALF:</td>
              <td><?php echo $roww['aroundCalf'] ?></td>
          </tr>
          <tr>
              <td>AROUND ANKLE:</td>
              <td><?php echo $roww['aroundAnkle'] ?></td>
          </tr>
          <tr>
              <td>TROUSERS LENGTH:</td>
              <td><?php echo $roww['trousersLength'] ?></td>
          </tr>
          <?php } ?>
        </table>
        <?php }
        else {
        ?>
        <table class="table table-striped table-sm" id="dataTable">
         <?php while($roww = mysqli_fetch_array($result2)) { ?>
          <tr>
              <td>Full Name</td>
              <td><?php echo $roww['full_name'] ?></td>
          </tr>
          <tr>
              <td class="text-center" colspan="2">WOMEN SHIRT</td>
          </tr>
          <tr>
              <td>NECK CIRCUMFERENCE:</td>
              <td><?php echo $roww['neckCircum'] ?></td>
          </tr>
          <tr>
              <td>NECK DEPTH:</td>
              <td><?php echo $roww['neckDepth'] ?></td>
          </tr>
          <tr>
              <td>SHOULDERS:</td>
              <td><?php echo $roww['shoulders'] ?></td>
          </tr>
          <tr>
              <td>BUST / CHEST:</td>
              <td><?php echo $roww['bustChest'] ?></td>
          </tr>
          <tr>
              <td>SLEEVE LENGTH:</td>
              <td><?php echo $roww['sleeveLength'] ?></td>
          </tr>
          <tr>
              <td>BICEP:</td>
              <td><?php echo $roww['bicep'] ?></td>
          </tr>
          <tr>
              <td>SLEEVE OPENING:</td>
              <td><?php echo $roww['sleeveOpening'] ?></td>
          </tr>
          <tr>
              <td>ARM HOLE:</td>
              <td><?php echo $roww['armHole'] ?></td>
          </tr>
          <tr>
              <td>SHIRT LENGTH:</td>
              <td><?php echo $roww['shirtLength'] ?></td>
          </tr>
          <tr>
              <td>WAIST:</td>
              <td><?php echo $roww['waist'] ?></td>
          </tr>
          <tr>
              <td>HIP CIRCUMFERENCE:</td>
              <td><?php echo $roww['hip'] ?></td>
          </tr>
          <tr>
              <td>DAMAN:</td>
              <td><?php echo $roww['daman'] ?></td>
          </tr>
          <tr>
              <td class="text-center" colspan="2">WOMEN TROUSER</td>
          </tr>
          <tr>
              <td>TROUSER LENGTH:</td>
              <td><?php echo $roww['trouserLength'] ?></td>
          </tr>
          <tr>
              <td>TROUSER INSEAM:</td>
              <td><?php echo $roww['trousarInseam'] ?></td>
          </tr>
          <tr>
              <td>WAIST CIRCUMFERENCE:</td>
              <td><?php echo $roww['trousarWaist'] ?></td>
          </tr>
          <tr>
              <td>HIP CIRCUMFERENCE:</td>
              <td><?php echo $roww['hipCircum'] ?></td>
          </tr>
          <tr>
              <td>CROTCH:</td>
              <td><?php echo $roww['crotch'] ?></td>
          </tr>
          <tr>
              <td>THIGH CIRCUMFERENCE:</td>
              <td><?php echo $roww['thighCircum'] ?></td>
          </tr>
          <tr>
              <td>KNEE CIRCUMFERENCE:</td>
              <td><?php echo $roww['kneeCircum'] ?></td>
          </tr>
          <tr>
              <td>TROUSER WAIST TO KNEE:</td>
              <td><?php echo $roww['trouserKnee'] ?></td>
          </tr>
          <tr>
              <td>BOTTOM IN ROUND/ANKLE:</td>
              <td><?php echo $roww['bottomRound'] ?></td>
          </tr>

          <?php } ?>
        </table>
        <?php } ?>
      </div>
    </main>
  </div>
</div>




<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>