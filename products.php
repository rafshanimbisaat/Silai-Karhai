
<?php
session_start();
require("db.php");

include("./layouts/header.php");
$id = $_GET["id"];
$sql = "SELECT p.*, u.name, u.locations, u.id as vendor_id FROM tbl_product p JOIN tbl_user u ON u.id = p.vendor WHERE category='".$id."'";
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
                <form method="POST" action="product-details-tailoring.php?id=<?php echo $roww['id'] ?>">
                    <div class="trainer-item">
                        <div class="image-thumb">
                         
                              <img src="admin/assets/images/<?php echo $roww['image'];?>" alt="Product Image" height="200px" width="352px">
                        </div>
                        <div class="down-content">
                            <span>
                              <sup>Rs</sup><?php echo $roww['product_price'] ?>
                            </span>
                            <h4><?php echo $roww['product_name'] ?></h4>
                            <h4  style="font-size: 15px !important">Vendor Name: <?php echo $roww['name'] ?></h4>
                            <h4 style="font-size: 13px !important">Location: <?php echo $roww['locations'] ?></h4>
                            <h4 style="font-size: 13px !important">Description: <?php echo $roww['description'] ?></h4>
                            <h6 style="display:none">Vendor Id: <?php echo $roww['vendor_id'] ?></h6>
                            <input type="hidden" name="product_name" value="<?php echo $roww['product_name'] ?>">
                            <input type="hidden" name="category" value="<?php echo $id ?>">
                            <input type="hidden" name="name" value="<?php echo $roww['name'] ?>">
                            <input type="hidden" name="vendor_id" value="<?php echo $roww['vendor_id'] ?>">
                            <input type="hidden" name="product_price" value="<?php echo $roww['product_price'] ?>">
                            <input type="number" name="quantity" min="1" max="15" oninput="validity.valid||(value='');" class="form-control"placeholder="Qty" value="1">
                            <ul class="social-icons">
                                <li><input type="submit" name="add_to_cart" class="btn btn-primary mt-3" value="Add to Cart"></li>
                            </ul>
                        </div>
                    </div>
                    </form>
                </div>
              
                <?php  
             }
                ?>

            <br>

            
                
            <!--<nav>
              <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>-->

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
    

    
    <?php
include("./layouts/footer.php")
?>