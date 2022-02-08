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
                        <h2>Men Size <em>Guide</em></h2>
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
                        <img src="/assets/images/Men.jpg" height="30%" width="30%"/>
                        <h5 class="mt-4 font-weight-bold">MEASUREMENT FOR MEN’S SHIRT/ TOP: </h5>
                        <div class="mt-4">
                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">1.	AROUND NECK:</span><br>
                            Measure around your neck in circumference.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">2.	ACROSS SHOULDERS:</span><br>
                            The horizontal width from one shoulder point to other shoulder point, take measurement from back side of shoulder.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">3.	AROUND CHEST:</span><br>
                            Measure the fullest part of your chest while keeping the tape a little loose for comfort.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">4.	AROUND NAVEL:</span><br>
                            Measure around your belly keeping the tape straight from front and back.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">5.	ARMHOLE:</span><br>
                            From the highest point on shoulder measure around arm hole with your arm hanging down.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">6.	BICEP:</span><br>
                            Measure the middle of the biceps keeping the arms relaxed.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">7.	SLEEVE LENGTH:</span><br>
                            Starting from the outside edge of shoulder bone up to the desired length.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">8.	AROUND WRIST:</span><br>
                            Measure around the wrist of your arm.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">9.	TOP LENGTH:</span><br>
                            This is the length of the sherwani starting from the high point of your shoulder down to the desired length.</p>

                        </div>

                        <h5 class="mt-5 font-weight-bold">MEASUREMENT FOR MEN’S BOTTOM: </h5>
                        <div class="mt-4">
                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">1.	AROUND WAIST:</span><br>
                            Measure around the waist keeping the tape straight from front and back.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">2.	AROUND HIP:</span><br>
                            Measure around the widest part of the buttocks keeping the tape straight from front and back.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">3.	AROUND THIGH:</span><br>
                            Measure around the widest part of the upper leg while standing straight. High up on the leg, just below the crotch.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">4.	AROUND KNEE:</span><br>
                            Measure around the knee cap.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">5.	AROUND CALF:</span><br>
                            Measure the girth around the largest part of the calf.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">6.	AROUND ANKLE:</span><br>
                            Measure around the ankle.</p>

                            <p><span class="font-weight-bold" style="font-size:18px; color:#de771c;">7.	TROUSERS LENGTH:</span><br>
                            This is the length of the trousers, pants or shalwar. Starting from the waistband down to the desired length.</p>


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