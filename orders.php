<?php
session_start();
include("./layouts/header.php");
require("db.php");
?>


    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/o.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2> <em> Orders </em></h2>
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
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <?php 
                                            $OrderSql = "SELECT o.id, o.order_date, o.payment_method, o.total_price, o.vendor_id, u.id as users_id, u.name as vendor_name FROM tbl_order o JOIN tbl_user u ON o.vendor_id  = u.id WHERE user_id='".$_SESSION['login']['id']."'";
                                           
                                            $OrderQuery = mysqli_query($conn, $OrderSql);
                                        ?>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Vendor Name</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         while($rows = mysqli_fetch_array($OrderQuery)){
                                        ?>
                                        <tr>
                                            <td><?php echo $rows['id'] ?></td>
                                            <td><?php echo $rows['vendor_name'] ?></td>
                                            <td><?php echo $rows['payment_method'] ?></td>
                                            <td><?php echo $rows['order_date'] ?></td>
                                            <td><?php echo $rows['total_price'] ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
   
            <br>
            <br>
        </section>


  </body>
</html>



<?php
include("./layouts/footer.php")
?>