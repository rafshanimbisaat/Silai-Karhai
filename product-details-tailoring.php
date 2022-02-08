<?php
session_start();

include("./layouts/header.php");
$category_id = 0;
if(isset($_POST['add_to_cart'])){

  if(isset($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'], 'id');
    if(!in_array($_GET['id'], $item_array_id)){
      $count = count($_SESSION['cart']);
      $session_array = array(
        'id' => $_GET['id'],
        'product_name' => $_POST['product_name'],
        'product_price' => $_POST['product_price'],
        'vendor_id' => $_POST['vendor_id'],
        'category' => $_POST['category'],
        'name' => $_POST['name'],
        'quantity' => $_POST['quantity']
      );
      $_SESSION['cart'][$count] = $session_array;
      ?>
      <script>
        window.location.href = "product-details-tailoring.php";
      </script>
        <?php
    }
    else{
      ?>
        <script>
        swal("Product already added").then(okay => {
        if (okay) {
            window.location.href = "services.php";
        }
        });
      </script>
      <?php
    }
    
  }else{
    $session_array = array(
      'id' => $_GET['id'],
      'product_name' => $_POST['product_name'],
      'product_price' => $_POST['product_price'],
      'vendor_id' => $_POST['vendor_id'],
      'category' => $_POST['category'],
      'name' => $_POST['name'],
      'quantity' => $_POST['quantity']
    );
    $_SESSION['cart'][] = $session_array;
    ?>
    <script>
      window.location.href = "product-details-tailoring.php";
    </script>
      <?php
  }
}

if(isset($_GET['action'])){
  if($_GET['action'] == "clearall"){
    unset($_SESSION['cart']);
    ?>
    <script>
      window.location.href = "product-details-tailoring.php";
    </script>
      <?php
  }

  if($_GET['action'] == "remove"){
    foreach($_SESSION['cart'] as $key => $value){
      if($value['id'] == $_GET['id']){
        unset($_SESSION['cart'][$key]);
        ?>
        <script>
          window.location.href = "product-details-tailoring.php";
        </script>
          <?php
      }
    }
  }
}

?>



    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/cart.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Shopping <em>Cart</em></h2>
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
              <div class="col-md-12">
              <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Vendor Name</th>
                  <th scope="col" style="display:none">Vendor Id</th>
                  <th scope="col" style="display:none">Category Id</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total Price</th>
                  <th scope="col">Action</th>
                </tr>
                  </thead>
                  <tbody>
                  <?php
                  if(!empty($_SESSION['cart']))
                  {
                    
                    $total = 0;
                    foreach($_SESSION['cart'] as $key => $value){
                  ?>
                    <tr>
                      <th scope="row"><?php echo $value['id'] ?></th>
                      <td><?php echo $value['product_name'] ?></td>
                      <td><?php echo $value['name'] ?></td>
                      <td style="display:none"><?php echo $value['vendor_id'] ?></td>
                      <td style="display:none"><?php echo $value['category'] ?></td>
                      <td><?php echo $value['product_price'] ?></td>
                      <td><?php echo $value['quantity'] ?></td>
                      <td><?php echo $value['quantity'] * $value['product_price'] ?></td>
                      <td><a href="product-details-tailoring.php?action=remove&id=<?php echo $value['id'] ?>">
                        <button class="btn btn-danger">Remove</button>
                      </a></td>
                    </tr>
                  <?php
                  $category_id = $value['category'];
                  $total = $total + $value['quantity'] * $value['product_price'];
                  }
                  ?>

                  <tr>
                    <td colspan="4"></td>
                    <td><b>Total Price</b></td>
                    <td><?php echo $total ?></td>
                    <td><a href='product-details-tailoring.php?action=clearall'>
                        <button class="btn btn-secondary">Clear</button>
                      </a></td>
                  </tr>
                  <?php
                  }
                    ?>
                  </tbody>
                </table>

                <br>
              </div>
              <div class="col-md-12">
                <div>
                <?php if($category_id != 2) {  ?>
                <a href="services.php" class="float-left btn btn-secondary">Continue Shopping</a>
                <?php } 
                if($category_id == 2){
                  ?>
                  <script>
                    swal("If you select tailor category then you can not select any other category. and If you select any other category then you can not select tailor category!");
                  </script>
                  <?php
                }
                ?>
                </div>
                <div>
                <?php if($category_id == 2) {  ?>
                <a href="measurement-guide.php" class="float-right btn btn-primary">Proceed</a>
                <?php } else { ?>
                <a href="checkout.php" class="float-right btn btn-primary">Proceed</a>
                <?php } ?>
                </div>
         
              </div>
                  </form>
                </div>

                <br>
              </div>
            </div>
        </div>
    </section>


  </body>
</html>

<?php
include("./layouts/footer.php")
?>