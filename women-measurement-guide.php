<?php
session_start();
include "db.php";
include("./layouts/header.php");



?>

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/5.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Women Size <em>Guide</em></h2>
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
                <div class="col-md-10">
                    <div class="contact-form">
                        <h3>MEASUREMENT DETAILS</h3>
                        <p class="mt-3">Y<span style="text-transform: lowercase;">OU MAY LEAVE SOME MEASUREMENT THAT ARE ONLY NEEDED FOR SPECIFIC OUTFITS. MAKE SURE YOU MEASURE CAREFULLY AND DOUBLE CHECK WITH IT.</span></p>
                        <p>P<span style="text-transform: lowercase;">LEASE KEEP IN MIND THAT YOU SHOULD BE WEARING NORMAL CLOTHES WHILE BEING MEASURED. <span style="text-transform: uppercase;">L</span>AY THE TAPE MEASURE FLAT AGAINST THE SKIN; DON’T PULL IT TOO TIGHT, NOR LET IT DROP.</span></p>
                        <p><span class="font-weight-bold" style="font-size:16px; color:#de771c;">NOTE:</span>&nbsp;&nbsp;&nbsp;All Measurements Must Be Taken In Inches.</p>
                        <img src="/assets/images/women.jpg" height="30%" width="30%"/>
                        <h5 class="mt-4 font-weight-bold">MEASUREMENT FOR WOMEN SHIRT: </h5>
                        <div class="mt-4">
                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">1.	NECK CIRCUMFERENCE:</span><br>
                            Measure round your neck in inches. Let the tape measure rest on your clavicle.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">2.	NECK DEPTH/  CENTRAL BACK NECK:</span><br>
                            Place tape measure to centre of the back neck to the point you require the depth.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">3.	CROSS SHOULDER:</span><br>
                            The horizontal width measurement from shoulder point to shoulder point. Take measurement at back shoulder.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">4.	BUST/CHEST CIRCUMFERENCE:</span><br>
                            Place tape measure round your chest at the fullest expanse of the bust.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">5.	SLEEVE LENGTH:</span><br>
                            Measure from the top of your shoulder to your wrist.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">6.	BICEP:</span><br>
                            Pace tape measure round your widest muscle of arm.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">7.	SLEEVE OPENING:</span><br>
                            Place tape measure round the wrist line.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">8.	ARMHOLE:</span><br>
                            Lift the arm a little and bend the elbow slightly - measure around the armhole loosely so that it will not bind when the arm is lifted up and down.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">9.	SHIRT LENGTH:</span><br>
                            Measure from shoulder to over bust and down to as long as you want. Usually down to bellybutton or slightly above the knee cap recommended for shalwar kameez and trouser suits.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">10. SHIRT WAIST:</span><br>
                            Place tape measure round the natural waistline.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">11. HIP CIRCUMFERENCE:</span><br>
                            The circumference along the horizontal line at the widest point of the hip across the fullest part of the buttocks and over the end of the thigh bone.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">12. DAMAN:</span><br>
                            The horizontal width measurement of your shirt daman.</p>

                        </div>

                        <h5 class="mt-5 font-weight-bold">MEASUREMENT FOR WOMEN TROUSER: </h5>
                        <div class="mt-4">
                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">1.	TROUSER LENGTH:</span><br>
                            Measure as outer length of trouser including waistband. This is the length from top of where you wear your trouser at the waist down till where the trouser hem skims your feet.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">2.	TROUSER INSEAM:</span><br>
                            Take inseam measurement from the crotch, where two legs join, to bottom of the leg.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">3.	TROUSER WAIST CIRCUMFERENCE:</span><br>
                            Place tape measure round the trouser waistline. Slight down to the shirt waist, measure at this point keeping tape parallel to the floor and comfortable around your trousers waist.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">4.	HIP CIRCUMFERENCE:</span><br>
                            The circumference along the horizontal line at the widest point of the hip across the fullest part of the buttocks and over the end of the thigh bone.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">5.	CROTCH:</span><br>
                            Trouser waist to join of the leg. You can also take crotch depth by sitting down on a flat hard chair. Take the measurement on the side from the waist to the chair.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">6.	THIGH CIRCUMFERENCE:</span><br>
                            Take thigh circumference round the widest part of the leg. High up on the leg, just below the crotch.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">7.	KNEE CIRCUMFERENCE:</span><br>
                            Measure around the knee little loosely.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">8.	TROUSER WAIST TO KNEE:</span><br>
                            Place tape measure to the trouser waist until knee cap. This measurement is usually required for ghararas, fishtail and mermaid cuts.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">9.	BOTTOM IN ROUND/ANKLE:</span><br>
                            The round area on the bottoms of trouser legs.</p>

                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-2">
                    <a href="https://silaikarai.000webhostapp.com/measurement-guide.php" class="btn btn-primary"/>Back</a>
                </div>
            </div>
        </div>
    </section>

    <?php
include("./layouts/footer.php")
?>