<?php
session_start();
include "db.php";
include("./layouts/header.php");
?>
    <!-- ***** Header Area End ***** -->

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/a.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Learn more <em>About Us</em></h2>
                        <h3><img src="assets/images/line-dec.png" alt=""></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <section>
                    <img src="assets/images/goal.jpg" alt="">
                    <h4>Our Goals</h4>

                    <p>Our aim is to make a website and mobile application where people can link up
with services providers like tailors, Pico maker, Embroidery maker, Dexter and then
they can place an online order of it according to their requirements.</p>

                    <p>When we talk about dress making, we must visit markets therefore we have to
walk around the whole market to search the perfect accessories like embroidery or
Pico or dying or tailoring, those markets are usually crowded on occasions like EID.
These options of services have never been gathered on a single platform.
The main purpose of this project is to provide the ultimate solution to all these
problems on your fingertips through our application and online portal. You get to
experience the same variety of options without the hustle.
</p>

                    <p>The main benefit of this project is that it covers the online selling of services
like tailoring, fabric Pico, fabric Embroidery, and Dexter in a single platform. By
using this application if a customer wants services individually they can easily get in
touch with them through our application.</p>
                   
                        <p class="text-center"><img src="assets/images/about1.jpg" alt="About Image"></p>
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/35.jpeg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Send us a <em>message</em></h2>
                        <h3><img src="assets/images/line-dec.png" alt=""></h3>
                        <p>Feel free to contact us</p>
                        <div class="main-button">
                            <a href="contact.php">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Footer Start ***** -->
    <?php
include("./layouts/footer.php")
?>