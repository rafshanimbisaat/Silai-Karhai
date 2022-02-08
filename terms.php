<?php
session_start();
include "db.php";
include("./layouts/header.php");
?>

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/t1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Read our <em>Terms Of Services</em></h2>
                        <h3><img src="assets/images/line-dec.png" alt=""></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <br>
            <br>
            <br>
            <article>
                <ol class="list-group">
                    <li class="list-group-item"> <span class="font-weight-bold">1.</span> Standard delivery takes 6 working days, customers can avail express service to get the dresses delivered in 2 or 3 days by paying extra charges.</li>
                    <li class="list-group-item"> <span class="font-weight-bold">2.</span> Silai Karhai is committed to provide the best quality of service to all our customers, however if you find an issue with fitting or quality of service or an alteration then you can contact us on our customer care number within a week of delivering your order.</li>
                    <li class="list-group-item"> <span class="font-weight-bold">3.</span> If the stitched garment is not as per the measurements entered in order form, we will alter at free of cost.</li>
                    <li class="list-group-item"> <span class="font-weight-bold">4.</span> If the stitched garment is as per the measurements and you still need some changes then we will charge an extra service charge and charges are depends on change requested.</li>
                    <li class="list-group-item"> <span class="font-weight-bold">5.</span> We only accept cash</li>
                    <li class="list-group-item"> <span class="font-weight-bold">6.</span> We are closed on Sunday and public holidays.</li>
                </ol>
              </article>
            <section class='tabs-content'>
              
            </section>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->

    <?php
include("./layouts/footer.php")
?>