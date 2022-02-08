<?php
session_start();
include "db.php";
include("./layouts/header.php");

if(isset($_POST['submit'])){
     $_SESSION['gender'] = $_POST['gender'];
     $_SESSION['neckCircum'] = $_POST['neckCircum'];
     $_SESSION['neckDepth'] = $_POST['neckDepth'];
     $_SESSION['shoulder'] = $_POST['shoulder'];
     $_SESSION['bustChest'] = $_POST['bustChest'];
     $_SESSION['sleeve'] = $_POST['sleeve'];
     $_SESSION['bicep'] = $_POST['bicep'];
     $_SESSION['sleeveOpening'] = $_POST['sleeveOpening'];
     $_SESSION['armHole'] = $_POST['armHole'];
     $_SESSION['shirtLength'] = $_POST['shirtLength'];
     $_SESSION['waist'] = $_POST['waist'];
     $_SESSION['hipCircum'] = $_POST['hipCircum'];
     $_SESSION['daman'] = $_POST['daman'];
     $_SESSION['trousarLength'] = $_POST['trousarLength'];
     $_SESSION['trousarInseam'] = $_POST['trousarInseam'];
     $_SESSION['waistCircums'] = $_POST['waistCircums'];
     $_SESSION['hipCircums'] = $_POST['hipCircums'];
     $_SESSION['crotch'] = $_POST['crotch'];
     $_SESSION['thighCircums'] = $_POST['thighCircums'];
     $_SESSION['knee'] = $_POST['knee'];
     $_SESSION['trousarKnee'] = $_POST['trousarKnee'];
     $_SESSION['roundAnkle'] = $_POST['roundAnkle'];
     $_SESSION['menAroundNeck'] = $_POST['menAroundNeck'];
     $_SESSION['menAcrossShoulders'] = $_POST['menAcrossShoulders'];
     $_SESSION['menAroundChest'] = $_POST['menAroundChest'];
     $_SESSION['menAroundNavel'] = $_POST['menAroundNavel'];
     $_SESSION['menArmHole'] = $_POST['menArmHole'];
     $_SESSION['menBicep'] = $_POST['menBicep'];
     $_SESSION['menSleeveLength'] = $_POST['menSleeveLength'];
     $_SESSION['menAroundWrist'] = $_POST['menAroundWrist'];
     $_SESSION['menTopLength'] = $_POST['menTopLength'];
     $_SESSION['menAroundWaist'] = $_POST['menAroundWaist'];
     $_SESSION['menAroundHips'] = $_POST['menAroundHips'];
     $_SESSION['menAroundThighs'] = $_POST['menAroundThighs'];
     $_SESSION['menAroundKnee'] = $_POST['menAroundKnee'];
     $_SESSION['menAroundCalf'] = $_POST['menAroundCalf'];
     $_SESSION['menAroundAnkle'] = $_POST['menAroundAnkle'];
     $_SESSION['menTrousarLength'] = $_POST['menTrousarLength'];
     $_SESSION['detailsSpecify'] = $_POST['detailsSpecify'];

     ?>
     <script>
          window.location.href = "checkout.php";
     </script>
     <?php
}



?>

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/5.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Measurements</h2>
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
                <div class="col-md-12">
                    <div class="contact-form">
                         <div>
                              <p><span class="font-weight-bold" style="color:#de771c; font-size:20px;">Note: </span>Please check measurement guides here.</p>
                              <a href="men-measurement-guide.php">For Men Guide</a><br>
                              <a href="women-measurement-guide.php">For Women Guide</a>
                         </div>
                        <form id="contact" class="mt-4" method="POST">
                           <div class="row">
                                <div class="col-sm-6 col-xs-12" id="gender">
                                     <label>SELECT GENDER:</label>
                                     <select name="gender" id="genders" onchange="showHideFields()" required>
                                         <option value="">  --Choose-- </option>
                                         <option value="Men">  Men </option>
                                         <option value="Women">  Women </option>
                                     </select>
                                </div>
                                <div class="col-md-12" id="womenFields">
                                    <div class="row">
                                <div class="col-sm-12 col-xs-12 mb-3" id="womenShirt">
                                    <h1 class="text-center" style="color:#de771c">WOMEN SHIRT</h1>
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>1. NECK CIRCUMFERENCE:</label>
                                     <input type="text" name="neckCircum" id="neckCircum">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>2. NECK DEPTH:</label>
                                     <input type="text" name="neckDepth" id="neckDepth">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>3. CROSS SHOULDERS:</label>
                                     <input type="text" name="shoulder" id="shoulder" >
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>4. BUST / CHEST:</label>
                                     <input type="text" name="bustChest" id="bustChest">
                                </div>                               
                                <div class="col-sm-3 col-xs-12" >
                                     <label>5. SLEEVE LENGTH:</label>
                                     <input type="text" name="sleeve" id="sleeve">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>6. BICEP:</label>
                                     <input type="text" name="bicep" id="bicep">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>7. SLEEVE OPENING:</label>
                                     <input type="text" name="sleeveOpening" id="sleeveOpening">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>8. ARM HOLE:</label>
                                     <input type="text" name="armHole" id="armHole">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>9. SHIRT LENGTH:</label>
                                     <input type="text" name="shirtLength" id="shirtLength">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>10. SHIRT WAIST:</label>
                                     <input type="text" name="waist" id="waist">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>11. HIP CIRCUMFERENCE:</label>
                                     <input type="text" name="hipCircum" id="hipCircum">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>12. DAMAN:</label>
                                     <input type="text" name="daman" id="daman">
                                </div>
                                <div class="col-sm-12 col-xs-12 mb-3" id="womenTrousar">
                                    <h1 class="text-center" style="color:#de771c">WOMEN TROUSER</h1>
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>1. TROUSER LENGTH:</label>
                                     <input type="text" name="trousarLength" id="trousarLength">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>2. TROUSER INSEAM:</label>
                                     <input type="text" name="trousarInseam" id="trousarInseam">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>3. TROUSER WAIST CIRCUMFERENCE:</label>
                                     <input type="text" name="waistCircums" id="waistCircums">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>4. HIP CIRCUMFERENCE:</label>
                                     <input type="text" name="hipCircums" id="hipCircums">
                                </div>                               
                                <div class="col-sm-3 col-xs-12" >
                                     <label>5. CROTCH:</label>
                                     <input type="text" name="crotch" id="crotch">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>6. THIGH CIRCUMFERENCE:</label>
                                     <input type="text" name="thighCircums" id="thighCircums">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>7. KNEE CIRCUMFERENCE:</label>
                                     <input type="text" name="knee" id="knee">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>8. TROUSER WAIST TO KNEE:</label>
                                     <input type="text" name="trousarKnee" id="trousarKnee">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>9. BOTTOM IN ROUND/ANKLE:</label>
                                     <input type="text" name="roundAnkle" id="roundAnkle">
                                </div>
                                </div>
                                </div>

                                <div class="col-md-12" id="menFields" style="display:none">
                                    <div class="row">
                                <div class="col-sm-12 col-xs-12 mb-3" id="menShirt">
                                    <h1 class="text-center" style="color:#de771c">MEN’S SHIRT/TOP</h1>
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>1. AROUND NECK:</label>
                                     <input type="text" name="menAroundNeck" id="menAroundNeck">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>2. ACROSS SHOULDERS:</label>
                                     <input type="text" name="menAcrossShoulders" id="menAcrossShoulders">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>3. AROUND CHEST:</label>
                                     <input type="text" name="menAroundChest" id="menAroundChest">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>4. AROUND NAVEL:</label>
                                     <input type="text" name="menAroundNavel" id="menAroundNavel">
                                </div>                               
                                <div class="col-sm-3 col-xs-12" >
                                     <label>5. ARMHOLE:</label>
                                     <input type="text" name="menArmHole" id="menArmHole">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>6. BICEP:</label>
                                     <input type="text" name="menBicep" id="menBicep">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>7. SLEEVE LENGTH:</label>
                                     <input type="text" name="menSleeveLength" id="menSleeveLength">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>8. AROUND WRIST:</label>
                                     <input type="text" name="menAroundWrist" id="menAroundWrist">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>9. TOP LENGTH:</label>
                                     <input type="text" name="menTopLength" id="menTopLength">
                                </div>
                                <div class="col-sm-12 col-xs-12 mb-3" id="menTrousar">
                                    <h1 class="text-center" style="color:#de771c">MEN’S BOTTOM</h1>
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>1. AROUND WAIST:</label>
                                     <input type="text" name="menAroundWaist" id="menAroundWaist">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>2. AROUND HIP:</label>
                                     <input type="text" name="menAroundHips" id="menAroundHips">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>3. AROUND THIGH:</label>
                                     <input type="text" name="menAroundThighs" id="menAroundThighs">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>4. AROUND KNEE:</label>
                                     <input type="text" name="menAroundKnee" id="menAroundKnee">
                                </div>                               
                                <div class="col-sm-3 col-xs-12" >
                                     <label>5. AROUND CALF:</label>
                                     <input type="text" name="menAroundCalf" id="menAroundCalf">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>6. AROUND ANKLE:</label>
                                     <input type="text" name="menAroundAnkle" id="menAroundAnkle">
                                </div>
                                <div class="col-sm-3 col-xs-12" >
                                     <label>7. TROUSERS LENGTH:</label>
                                     <input type="text" name="menTrousarLength" id="menTrousarLength">
                                </div>
                                </div>
                                </div>
                                <div class="col-sm-12 col-xs-12" >
                                     <label>PLEASE SPECIFY THE DESCRIPTION HERE, WHICH STYLE YOU WANT AND OTHER DETAILS:</label>
                                     <textarea name="detailsSpecify" id="detailsSpecify" cols="30" rows="10"></textarea>
                                </div>
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
            </div>
        </div>
    </section>
    <script>
        function showHideFields() {
          var gender = document.getElementById("genders");
          var menFields = document.getElementById("menFields");
          var womenFields = document.getElementById("womenFields");

          menFields.style.display = gender.value == "Women" ? "none" : "block";
          womenFields.style.display = gender.value == "Men" ? "none" : "block";
        }

        $("#genders").on('change', function() {
          const gender = this.value;
          if (gender == 'Men') {
               $("#menAroundNeck").prop('required', true);
               $("#menAcrossShoulders").prop('required', true);
               $("#menAroundChest").prop('required', true);
               $("#menAroundNavel").prop('required', true);
               $("#menArmHole").prop('required', true);
               $("#menBicep").prop('required', true);
               $("#menSleeveLength").prop('required', true);
               $("#menAroundWrist").prop('required', true);
               $("#menTopLength").prop('required', true);
               $("#menAroundWaist").prop('required', true);
               $("#menAroundHips").prop('required', true);
               $("#menAroundThighs").prop('required', true);
               $("#menAroundKnee").prop('required', true);
               $("#menAroundCalf").prop('required', true);
               $("#menAroundAnkle").prop('required', true);
               $("#menTrousarLength").prop('required', true);
     
          } else {
               $("#menAroundNeck").prop('required', false);
               $("#menAcrossShoulders").prop('required', false);
               $("#menAroundChest").prop('required', false);
               $("#menAroundNavel").prop('required', false);
               $("#menArmHole").prop('required', false);
               $("#menBicep").prop('required', false);
               $("#menSleeveLength").prop('required', false);
               $("#menAroundWrist").prop('required', false);
               $("#menTopLength").prop('required', false);
               $("#menAroundWaist").prop('required', false);
               $("#menAroundHips").prop('required', false);
               $("#menAroundThighs").prop('required', false);
               $("#menAroundKnee").prop('required', false);
               $("#menAroundCalf").prop('required', false);
               $("#menAroundAnkle").prop('required', false);
               $("#menTrousarLength").prop('required', false);
          }
          if (gender == 'Women') {
               $("#neckCircum").prop('required', true);
               $("#neckDepth").prop('required', true);
               $("#shoulder").prop('required', true);
               $("#bustChest").prop('required', true);
               $("#sleeve").prop('required', true);
               $("#bicep").prop('required', true);
               $("#sleeveOpening").prop('required', true);
               $("#armHole").prop('required', true);
               $("#shirtLength").prop('required', true);
               $("#waist").prop('required', true);
               $("#hipCircum").prop('required', true);
               $("#daman").prop('required', true);
               $("#trousarLength").prop('required', true);
               $("#trousarInseam").prop('required', true);
               $("#waistCircums").prop('required', true);
               $("#hipCircums").prop('required', true);
               $("#crotch").prop('required', true);
               $("#thighCircums").prop('required', true);
               $("#knee").prop('required', true);
               $("#trousarKnee").prop('required', true);
               $("#roundAnkle").prop('required', true);
          } else {
               $("#neckCircum").prop('required', false);
               $("#neckDepth").prop('required', false);
               $("#shoulder").prop('required', false);
               $("#bustChest").prop('required', false);
               $("#sleeve").prop('required', false);
               $("#bicep").prop('required', false);
               $("#sleeveOpening").prop('required', false);
               $("#armHole").prop('required', false);
               $("#shirtLength").prop('required', false);
               $("#waist").prop('required', false);
               $("#hipCircum").prop('required', false);
               $("#daman").prop('required', false);
               $("#trousarLength").prop('required', false);
               $("#trousarInseam").prop('required', false);
               $("#waistCircums").prop('required', false);
               $("#hipCircums").prop('required', false);
               $("#crotch").prop('required', false);
               $("#thighCircums").prop('required', false);
               $("#knee").prop('required', false);
               $("#trousarKnee").prop('required', false);
               $("#roundAnkle").prop('required', false);
          }
        });
    </script>  

    <?php
include("./layouts/footer.php")
?>