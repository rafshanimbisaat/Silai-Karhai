
<?php
session_start();
require("db.php");
include("./layouts/header.php");
$sql = "SELECT * FROM tbl_category";
$result = mysqli_query($conn, $sql);
?>
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/s1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Services</em></h2>
                        <h3><img src="assets/images/line-dec.png" alt=""></h3>
                        <!--<p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div class="row">
            <?php
             while($roww = mysqli_fetch_array($result)){
            ?>
                <div class="col-lg-3">           
                    <div class="trainer-item">
                        <div class="image-thumb">
                                <img src="admin/assets/images/category/<?php echo $roww['image'];?>" alt="Category Image" height="200px" width="352px">
                        </div>
                        <div class="down-content">
                            <h4 class="mt-3 text-center"><?php echo $roww['category_name'] ?></h4>                           
                        </div>
                        <div class="down-content text-center">
                            <a href="products.php?id=<?php echo $roww['id'] ?>" class="register-btn">Products</a>                           
                        </div>
                    </div>
                    
                </div>
              
                <?php  
             }
                ?>

            <br>


        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    
    <?php
include("./layouts/footer.php")
?>