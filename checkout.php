<?php
session_start();
include "db.php";
include("./layouts/header.php");
$last_id;
if(!$_SESSION['login']['email']){
    ?>
    <script>
        swal("Please login to proceed").then(okay => {
        if (okay) {
            window.location.href = "admin/login.php";
        }
        });
    </script>
    <?php
    // header("location:admin/login.php");
}
    $total = 0;
    $vendor_id = "";
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $value){
            $total = $total + $value['quantity'] * $value['product_price'];
            $vendor_id = $value['vendor_id'];
        }
    }

if(isset($_POST['submit'])){
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone_number'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $payment = $_POST['payment_method'];
    $rider_id = $_POST['rider'];

    $sql = "INSERT INTO tbl_order (order_date, full_name, email, gender, user_id, phone, address, location, city, state, zip, payment_method, total_price, rider_id, vendor_id)
            VALUES
            ('".date("Y-m-d")."', '".$fullName."', '".$email."', '".$gender."', '".$_SESSION['login']['id']."', '".$phone."', '".$address."', '".$location."', '".$city."', '".$state."', '".$zip."', '".$payment."', '".$total."', '".$rider_id."', '".$vendor_id."')";

    $result = mysqli_query($conn, $sql);
    $last_id = mysqli_insert_id($conn);
    foreach($_SESSION['cart'] as $key => $value){
        $sql2 = "INSERT INTO tbl_order_detail (order_id, product_id, quantity, price) 
                VALUES 
                ('".$last_id."', '".$value['id']."', '".$value['quantity']."', '".$value['product_price']."')";
        $result2 = mysqli_query($conn, $sql2);
    }

    if(isset($_SESSION['gender'])){
        if($_SESSION['gender'] == "Women"){
            $sql3 = "INSERT INTO tbl_female_measurement (order_id, user_id, neckCircum, neckDepth, shoulders, bustChest, sleeveLength,
                                                        bicep, sleeveOpening, armHole, shirtLength, waist, hip, daman, trouserLength, trousarInseam,
                                                        trousarWaist, hipCircum, crotch, thighCircum, kneeCircum, trouserKnee, bottomRound, detailsSpecify)
                                                        VALUES
                                                        ('".$last_id."', '".$_SESSION['login']['id']."' ,'".$_SESSION['neckCircum']."','".$_SESSION['neckDepth']."','".$_SESSION['shoulder']."','".$_SESSION['bustChest']."',
                                                        '".$_SESSION['sleeve']."','".$_SESSION['bicep']."','".$_SESSION['sleeveOpening']."','".$_SESSION['armHole']."',
                                                        '".$_SESSION['shirtLength']."','".$_SESSION['waist']."','".$_SESSION['hipCircum']."','".$_SESSION['daman']."',
                                                        '".$_SESSION['trousarLength']."','".$_SESSION['trousarInseam']."','".$_SESSION['waistCircums']."','".$_SESSION['hipCircums']."',
                                                        '".$_SESSION['crotch']."','".$_SESSION['thighCircums']."','".$_SESSION['knee']."','".$_SESSION['trousarKnee']."',
                                                        '".$_SESSION['roundAnkle']."', '".$_SESSION['detailsSpecify']."')";
            $result3 = mysqli_query($conn, $sql3);
        }
        if($_SESSION['gender'] == "Men"){
            $sql4 = "INSERT INTO tbl_male_measurement (order_id, user_id, aroundNeck, aroundShoulder, aroundChest, aroundNavel, armHole,
                                                        bicep, sleeveLength, aroundWrist, topLength, aroundWaist, aroundHip, aroundThigh, aroundKnee, aroundCalf,
                                                        aroundAnkle, trousersLength, detailsSpecify)
                                                        VALUES
                                                        ('".$last_id."', '".$_SESSION['login']['id']."' ,'".$_SESSION['menAroundNeck']."','".$_SESSION['menAcrossShoulders']."','".$_SESSION['menAroundChest']."','".$_SESSION['menAroundNavel']."',
                                                        '".$_SESSION['menArmHole']."','".$_SESSION['menBicep']."','".$_SESSION['menSleeveLength']."','".$_SESSION['menAroundWrist']."',
                                                        '".$_SESSION['menTopLength']."','".$_SESSION['menAroundWaist']."','".$_SESSION['menAroundHips']."','".$_SESSION['menAroundThighs']."',
                                                        '".$_SESSION['menAroundKnee']."','".$_SESSION['menAroundCalf']."','".$_SESSION['menAroundAnkle']."','".$_SESSION['menTrousarLength']."', '".$_SESSION['detailsSpecify']."')";
            $result4 = mysqli_query($conn, $sql4);
        }
    }

    if($result && $result2 || $result3 || $result4){
        ?>
        <script>
            swal("Order has been submitted successfully").then(okay => {
            if (okay) {
                window.location.href = "thankyou.php?order_id=<?php echo $last_id  ?>";
            }
            });
        </script>
        <?php
    }
    else{
        ?>
        <script>
            swal("Order submission failed");
        </script>
        <?php
    }
    
}


?>

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/c2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Easy <em>Checkout</em></h2>
                        <h3><img src="assets/images/line-dec.png" alt=""></h3>
                        <!--<p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form id="contact" method="post">
                           <div class="row">
                                
                                <div class="col-sm-6 col-xs-12">
                                     <label>Name:</label>
                                     <input type="text" name="full_name" required>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Email:</label>
                                     <input type="email" name="email" required>
                                </div>
                
                                <div class="col-sm-6 col-xs-12">
                                     <label>Gender:</label>
                                     <select name="gender" id="gender">
                                         <option value="">Select Gender</option>
                                         <option value="Male">Male</option>
                                         <option value="Female">Female</option>
                                     </select>
                                </div>
                                
                                <div class="col-sm-6 col-xs-12">
                                     <label>Phone:</label>
                                     <input type="text" name="phone_number" required>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Address:</label>
                                     <input type="text" name="address" required>
                                </div>
                      
        
                                
                                <div class="col-sm-6 col-xs-12">
                                     <label>Select Your Location:</label>
                                     <!--<input type="text">-->
							<select name="location" required>
                                <option value="North Nazimabad Karachi">North Nazimabad Karachi</option>
                                <option value="Gulshan Karachi">Gulshan Karachi</option>
                                <option value="Bahadurabad Karachi">Bahadurabad Karachi</option>
                                <option value="Pechs Karachi">Pechs Karachi</option>
                                <option value="Johar Karachi">Johar Karachi</option>
                                <option value="Tariq Road Karachi">Tariq Road Karachi</option>
                                <option value="DHA Karachi">DHA Karachi</option>
                            </select>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>City:</label>
                                     <input type="text" name="city">
                                </div>
                               
                                <div class="col-sm-6 col-xs-12">
                                     <label>State:</label>
                                     <input type="text" name="state" required>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Zip:</label>
                                     <input type="text" name="zip" required>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Payment method</label>
                                     
                                     <select name="payment_method" required>
                                          <option value="">-- Choose --</option>
                                          <option value="cash">Cash</option>
                                     </select>
                                </div>
                                <?php 
                                $sql = "SELECT * FROM tbl_user WHERE roles=3";
                                $query = mysqli_query($conn, $sql); 
                                ?>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Select Rider</label>
                                     
                                     <select name="rider" required>
                                        <option value="">-- Choose --</option>
                                     </select>
                                </div>
                                <!--<div class="col-sm-6 col-xs-12">
                                     <label>Captcha</label>
                                     <input type="text">
                                </div>-->
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <div class="float-left">
                                            <a href="product-details-tailoring.php">Back</a>
                                        </div>
                                        <div class="float-right">
                                            <input type="submit" name="submit" class="btn btn-danger">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <br>
                </div>

                <div class="col-md-4">
                    <ul class="list-group list-group-no-border">
                      <li class="list-group-item" style="margin:0 0 -1px">
                         <div class="row">
                            <div class="col-6">
                     
                                <strong>Sub-total</strong>
                            </div>

                            <div class="col-6">
                                <h5 class="text-right"><?php if(!empty($_SESSION['cart'])){ echo $total; } else{ echo "00"; } ?></h5>
                            </div>
                            
                         </div>
                      </li>


                      <li class="list-group-item" style="margin:0 0 -1px">
                         <div class="row">
                            <div class="col-6">
                                <h4><strong>Total</strong></h4>
                            </div>
                    
                            <div class="col-6">
                                <h4 class="text-right"><?php if(!empty($_SESSION['cart'])){ echo $total; } else{ echo "00"; }  ?></h4>
                            </div>
                            
                         </div>
                      </li>
                    </ul>

                    <br>
                </div>
            </div>
        </div>
    </section>
    <script>
        $( "select[name='location']" ).change(function () {
                var rider_id = $(this).val();
                if(rider_id) {
                    $.ajax({
                        url: "location-rider.php",
                        dataType: 'Json',
                        data: {'locations':rider_id},
                        success: function(data) {
                            $('select[name="rider"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="rider"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });


                }else{
                    $('select[name="rider"]').empty();
                }
            });
    </script>

    <?php
include("./layouts/footer.php")
?>