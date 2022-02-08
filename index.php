<?php
session_start();
require("db.php");
include("./layouts/header.php");
$sql = "SELECT * FROM tbl_category";
$result = mysqli_query($conn, $sql); 
?>

<!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/video2.mp4" type="video/mp4" />
        </video>
        <div class="video-overlay header-text">
            <div class="caption">
                <h2> <span style="font-size:50px">Best</span>  <br><em>Silai Karhai</em> <br> <span style="font-size:50px">in town</span></h2>
                <h6>DISCOVER THE NEW YOU</h6>
                <h3><img src="assets/images/line-dec.png" alt=""></h3>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

   <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Try Our <em>Services</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Best services in town.</p>
                         <p><em>Our promise we only work with the best materials available. We never compromise quality for time and give my clients realistic schedules that accommodate their lives. We strive for honest customer service.</em></p>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
             while($roww = mysqli_fetch_array($result)){
            ?>
                <div class="col-lg-3">           
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <a href="services.php">
                                <img src="admin/assets/images/category/<?php echo $roww['image'];?>" alt="Category Image" height="200px" width="352px">
                            </a>
                        </div>
                        <div class="down-content">
                            <h4 class="mt-3 text-center"><?php echo $roww['category_name'] ?></h4>                           
                        </div>
                    </div>
            
                </div>
              
                <?php  
             }
                ?>


            <br>
            </div>

            <div class="main-button text-center">
                <a href="services.php">View our Services</a>
            </div>
        </div>
    </section>
    <!-- ***** Cars Ends ***** -->

    <section class="section section-bg" id="schedule" style="background-image: url(assets/images/logo.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                    	<h2>Want To Know About <em>Silai Krhai</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p><em>Our objective is to provide a single plateform to get different silai krhai services. We will provide an online portal and application where consumers will find all the people involved in clothing such as tailors, Embroidery personnel, pico personnel, dexter etc.
                        On this application all these people related to clothing can easily get themselves registered and provide services through our site/app service.</em></p>
                        <div class="main-button">
                            <a href="about.php">About Us</a>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content text-center">
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore deleniti voluptas enim! Provident consectetur id earum ducimus facilis, aspernatur hic, alias, harum rerum velit voluptas, voluptate enim! Eos, sunt, quidem.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto nulla quo cum officia laboriosam. Amet tempore, aliquid quia eius commodi, doloremque omnis delectus laudantium dolor reiciendis non nulla! Doloremque maxime quo eum in culpa mollitia similique eius doloribus voluptatem facilis! Voluptatibus, eligendi, illum. Distinctio, non!</p>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    
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


    <!-- ***** Blog Start ***** -->
 
    <!-- ***** Blog End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/35.jpeg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Send us a <em>message</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
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

    <!-- ***** Testimonials Item Start ***** -->
   
    <!-- ***** Testimonials Item End ***** -->
    
    <!-- ***** Footer Start ***** -->
  <?php
    include("./layouts/footer.php")
    ?>


   
