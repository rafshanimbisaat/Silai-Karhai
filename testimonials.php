<?php
session_start();
include "db.php";
include("./layouts/header.php");
?>

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/02.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Read our <em>Testimonials</em></h2>
                        <h3><img src="assets/images/line-dec.png" alt=""></h3>
                        <!-- <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- ***** Testimonials Item Start ***** -->
     <section class="testimonial text-center">
        <div class="container">

            <div class="heading white-heading">
                Testimonial
            </div>
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
             
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                           <img src="./assets/images/icon3.jpg" class="img-circle img-responsive" />
                            <p>There Thread Embroidery is best and High in quality. Very good customer service. I also recommend others too.</p>
                            <h4>Uzma Shakeel</h4>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="./assets/images/icon3.jpg" class="img-circle img-responsive" />
                            <P>Service is great and the quality of the stitching is awesome. Quite unexpected for such a low price. </p>
                            <h4>Sabeen Farooq</h4>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="./assets/images/icon3.jpg" class="img-circle img-responsive" />
                            <p>It’s hard to find a vender that is reliable, trustworthy, and actually delivers when they say. I truly enjoying their services and the quality of their services is outstanding.</p>
                            <h4>Alizey Altaf</h4>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Item End ***** -->

    <?php
include("./layouts/footer.php")
?>