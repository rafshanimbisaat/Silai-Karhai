
<?php
session_start();
require("db.php");
include("./layouts/header.php");
$order_id = $_GET['order_id'];
unset($_SESSION['cart']);
unset($_SESSION['gender']);
unset($_SESSION['neckCircum']);
unset($_SESSION['neckDepth']);
unset($_SESSION['shoulder']);
unset($_SESSION['bustChest']);
unset($_SESSION['sleeve']);
unset($_SESSION['bicep']);
unset($_SESSION['sleeveOpening']);
unset($_SESSION['armHole']);
unset($_SESSION['shirtLength']);
unset($_SESSION['waist']);
unset($_SESSION['hipCircum']);
unset($_SESSION['daman']);
unset($_SESSION['trousarLength']);
unset($_SESSION['trousarInseam']);
unset($_SESSION['waistCircums']);
unset($_SESSION['hipCircums']);
unset($_SESSION['crotch']);
unset($_SESSION['thighCircums']);
unset($_SESSION['knee']);
unset($_SESSION['trousarKnee']);
unset($_SESSION['roundAnkle']);
unset($_SESSION['menAroundNeck']);
unset($_SESSION['menAcrossShoulders']);
unset($_SESSION['menAroundChest']);
unset($_SESSION['menAroundNavel']);
unset($_SESSION['menArmHole']);
unset($_SESSION['menBicep']);
unset($_SESSION['menSleeveLength']);
unset($_SESSION['menAroundWrist']);
unset($_SESSION['menTopLength']);
unset($_SESSION['menAroundWaist']);
unset($_SESSION['menAroundHips']);
unset($_SESSION['menAroundThighs']);
unset($_SESSION['menAroundKnee']);
unset($_SESSION['menAroundCalf']);
unset($_SESSION['menAroundAnkle']);
unset($_SESSION['menTrousarLength']);
unset($_SESSION['detailsSpecify']);

?>
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/o.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Thank <em>You!</em></h2>
                        <h3><img src="assets/images/line-dec.png" alt=""></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action Start ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Your Order Has Been <em>Submitted </em>Successfully</h2>
                        <h4 class="mt-4">Your Order Number is: <span style="font-family:arial; font-weight:bold; font-size: 30px"> <?php echo $order_id;  ?> </span></h4>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Our Vendor And Rider Will Contact You Soon</p>
                        <a href="index.php" class="btn btn-primary">Back to Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    
    <?php
include("./layouts/footer.php")
?>