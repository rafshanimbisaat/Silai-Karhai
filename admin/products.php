<?php 
  session_start(); 
  if(!$_SESSION['login']['email']){
    ?>
    <script>
      window.location.href = "login.php"
    </script>
    <?php
  }
  require("../db.php");
  include_once("./templates/top.php"); 
  include_once("./templates/navbar-v.php"); 

  if($_SESSION['login']['role'] == 1){
  $sql = "SELECT p.id, p.product_name, p.product_price, p.image, p.description, c.category_name, u.name FROM tbl_product p JOIN tbl_category c ON p.category = c.id JOIN tbl_user u ON u.id = p.vendor";
  }
  else{
  $sql = "SELECT p.id, p.product_name, p.product_price, p.image, p.description, c.category_name, u.name FROM tbl_product p JOIN tbl_category c ON p.category = c.id JOIN tbl_user u ON u.id = p.vendor WHERE p.vendor = '".$_SESSION['login']['id']."'";
  }
  $result = mysqli_query($conn, $sql); 


?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>
<br><br>
      <div class="row">
      	<div class="col-10">
      		<h2>Product List</h2>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Category</th>
              <th>Vendor</th>
              <th>Image</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody >
          <?php
             while($roww = mysqli_fetch_array($result)){
          ?>
            <tr>
              <th scope="row"><?php echo $roww["id"] ?></th>
              <td><?php echo $roww["product_name"] ?></td>
              <td><?php echo $roww["product_price"] ?></td>
              <td><?php echo $roww["category_name"] ?></td>
              <td><?php echo $roww["name"] ?></td>
              <td><img src="assets/images/<?php echo $roww['image'];?>" alt="Product Image" height="50" width="75"></td>
              <td><?php echo $roww["description"] ?></td>
              <td><a href="#" class="editProduct btn btn-primary" data-id="<?php echo $roww["id"] ?>" data-toggle="modal" data-image="assets/images/<?php echo $roww['image'];?>">Edit</a>&nbsp;&nbsp;<a href="deleteProduct.php?id=<?php echo $roww['id'] ?>" class="btn btn-danger delete" data-confirm="Are you sure you want to delete this product ?">Delete</a></td>
            </tr>
            <?php
             }
             ?>
          </tbody>
          <script>
                var deleteLinks = document.querySelectorAll('.delete');
                for (var i = 0; i < deleteLinks.length; i++) {
                    deleteLinks[i].addEventListener('click', function(event) {
                        event.preventDefault();
                        var choice = confirm(this.getAttribute('data-confirm'));
                        if (choice) {
                            window.location.href = this.getAttribute('href');
                        }
                    });
                }
                </script>
        </table>
      </div>
    </main>
  </div>
</div>

<?php
  if(isset($_POST['productUpdate'])){
    $id = $_POST['update_id'];
    $productName = $_POST['pname'];
    $productPrice = $_POST['pprice'];
    $category = $_POST['category_id'];
    $file = $_FILES['file'];
    $desc = $_POST['product_desc'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = "assets/images/".$fileNameNew;
                if(move_uploaded_file($fileTmpName, $fileDestination)){
                    $sql = "UPDATE tbl_product SET product_name = '$productName', product_price = '$productPrice', category='$category', image='$fileNameNew', description='$desc' WHERE id = $id";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                    ?>
                        <script>
                          window.location.href = "products.php";
                        </script>
                        <?php
                    }
                }
                
            }
            else{
                echo "Your file is too big!";
            }
        }
        else{
            echo "There was an error uploading your file!";
        }

    }
    else{
        echo "You cannot upload files of this type!";
    }

    if($fileName == ""){
      $sql = "UPDATE tbl_product SET product_name = '$productName', product_price = '$productPrice', category='$category',description='$desc' WHERE id = $id";
      $result = mysqli_query($conn, $sql);
      if($result){
        ?>
          <script>
            window.location.href = "products.php";
          </script>
        <?php
      }
    }
}
?>

<!-- Add Product Modal start -->
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action=""  method="POST" enctype="multipart/form-data">
        	<div class="row">
          <input type="hidden" name="update_id" id="update_id">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Name</label>
		        		<input type="text" name="pname" id="pname" class="form-control">
		        	</div>
        		</div>
            <div class="col-12">
        			<div class="form-group">
		        		<label>Product Price</label>
		        		<input type="text" name="pprice" id="pprice" class="form-control">
		        	</div>
        		</div>
            <?php
            $sql1 = "SELECT * from tbl_category";
            $result1 = mysqli_query($conn, $sql1); 
            ?>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Category Name</label>
		        		<select class="form-control category_list" name="category_id" id="category_id" required>
                <option value="">Select Category</option>
                  <?php
                  while($row = mysqli_fetch_array($result1)){
                  ?>	
                  <option value="<?php echo $row['id'] ?>"> <?php echo $row['category_name'] ?> </option>;
                  <?php
                  }
                  ?>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Description</label>
		        		<textarea class="form-control" name="product_desc" id="product_desc"></textarea>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
                <label for="image" class="col-form-label">Product Image:</label>
                <input type="file" class="form-control"  name="file">
                <img src="" class="mt-2" id="image" height="100px" width="200px">
              </div>
        		</div>
        		<div class="col-12">
        			<button type="submit" name="productUpdate" class="btn btn-primary add-product">Update Product</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    var table = $("#dataTable").DataTable();
    table.on("click", ".editProduct", function(){
      $tr = $(this).closest('tr');
      console.log('tr', $tr);
      if($($tr).hasClass('child')){
        $tr = $tr.prev('.parent');
        console.log('in here');
      }
      var data = table.row($tr).data();
      $('#update_id').val(data[0]);
      $('#pname').val(data[1]);
      $('#pprice').val(data[2]);
      $('#category_id').val(data[3]);
      $('#product_desc').val(data[6]);
      $('#image').attr("src",$(this).data('image'));
      $('#editProduct').modal('show');
    })
</script>

<?php include_once("./templates/footer.php"); ?>