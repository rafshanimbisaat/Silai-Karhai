<?php
session_start();
include("./layouts/header.php");
require("db.php");

if(isset($_POST["submit"])){
    $vendor = $_POST["vendor_name"];
    $product = $_POST["products"];
    $feedback = $_POST["feedback"];
    $email = $_POST["email"];
  
    $query = "INSERT INTO tbl_feedback (vendor_name, email, product, feedback) VALUES ('".$vendor."', '".$email."', '".$product."', '".$feedback."')";
    $res = mysqli_query($conn, $query);
    if($res){
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
              swal("Feedback submitted successfully")
            });
        </script>
        <?php
    }
    else{
        die('Error: ' . mysqli_error($conn));
    }
  }
?>


    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/01.jpeg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2> Give us a <em>Feedback</em></h2>                        
                        <h3><img src="assets/images/line-dec.png" alt=""></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
        <section class="section">
            <div class="container">
            <br>
            <br>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <form method="POST">
                            <?php
                                $sql1 = "SELECT * from tbl_user WHERE roles=2";
                                $result1 = mysqli_query($conn, $sql1); 
                            ?>
                            <div class="col-md-6">
                                <label for="vendor_name" style="font-weight:bold">Vendor Name </label>
                                <select class="form-control" name="vendor_name" id="vendor_name" required>
                                    <option value="">Select Vendor</option>
                                    <?php
                                    while($row = mysqli_fetch_array($result1)){
                                    ?>	
                                    <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>;
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="products" style="font-weight:bold">Product </label>
                                <select class="form-control" name="products" id="products" required>
                                    <option value="">Select Product</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="email" style="font-weight:bold">Email </label>
                               <input type="email" name="email" class="form-control" required>
                            </div>
                              
                            <div class="col-md-6">
                                <label for="feedback" style="font-weight:bold"> Feedback</label>
                                <textarea name="feedback" id="feedback" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="submit" class="register-btn mt-3"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </section>


  </body>
  <script>
           
            $( "select[name='vendor_name']" ).change(function () {
                var product_id = $(this).val();
                if(product_id) {
                    $.ajax({
                        url: "vendor-product.php",
                        dataType: 'Json',
                        data: {'id':product_id},
                        success: function(data) {
                            $('select[name="products"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="products"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });


                }else{
                    $('select[name="products"]').empty();
                }
            });
        </script>
</html>



<?php
include("./layouts/footer.php")
?>