<?php
session_start();
include("./layouts/header.php");
require("db.php");

?>


    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/26.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2> Track Your <em> Order </em></h2>
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
                    <div class="col-md-6 mt-3">
                        <form method="POST">
                            <div class="row rowcustom" style="align-items: end">
                                <div class="col-md-8 mt-3">
                                    <label>Order Number:</label>
                                    <input class="form-control" placeholder="Enter Order Number" name="searchid" id="searchid" required />
                                </div>
                                <div class="col-md-4 mt-3">
                                    <input class="form-control btn btn-primary" type="submit" name="search" value="Search"/>
                                </div>
                            </div>
                            
                            
                                
                            
                        </form>
                    </div>
                    <?php
                    
                    if(isset($_POST['search'])){
                        $number = $_POST['searchid'];

                        $sql = "SELECT o.id, order_date, CASE status
                        WHEN 0 THEN 'Pending'
                        WHEN 1 THEN 'Approved'
                        WHEN 2 THEN 'Delivered'
                        END AS 'status', payment_method, o.total_price as total_price,  u.name as vendor_name FROM tbl_order o JOIN tbl_user u ON o.vendor_id  = u.id WHERE o.id='".$number."'";
                        // die($sql);
                        $query = mysqli_query($conn, $sql);
                    
                    ?>
                    <div class="col-md-12 mt-3">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Vendor Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         while($rows = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?php echo $rows['id'] ?></td>
                                            <td><?php echo $rows['vendor_name'] ?></td>
                                            <td><?php echo $rows['status'] ?></td>
                                            <td><?php echo $rows['payment_method'] ?></td>
                                            <td><?php echo $rows['total_price'] ?></td>
                                            <td><?php echo $rows['order_date'] ?></td>
                                        </tr>
                                        <?php
                                        }
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