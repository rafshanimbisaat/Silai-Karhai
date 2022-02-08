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
?>

<?php include_once("../admin/templates/top.php"); ?>
<?php include_once("../admin/templates/navbar-v.php"); ?>
<?php include "../admin/templates/sidebar.php"; ?>
<?php
  
if(isset($_POST['addProduct'])){
    $productName = $_POST['pname'];
	$productPrice = $_POST['pprice'];
	$category = $_POST['pcategory'];
	$vendor = $_POST['vendor'];
	$file = $_FILES['file'];
	$desc = $_POST['pdesc'];

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
					if($_SESSION['role'] == 1){
                    	$sql = "INSERT INTO tbl_product (product_name, product_price, category, vendor, image, description) VALUES ('".$productName."', '".$productPrice."', '".$category."', '".$vendor."', '".$fileNameNew."', '".$desc."')";
					}
					else{
						$sql = "INSERT INTO tbl_product (product_name, product_price, category, vendor, image, description) VALUES ('".$productName."', '".$productPrice."', '".$category."', '".$_SESSION['login']['id']."', '".$fileNameNew."', '".$desc."')";
					}
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
}
?>
<br><nr><br>
<h2>Add Product</h2>
<div class="container-fluid">
  <div class="row">
		<form method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
			<div class="col-md-12">
				<label for="validationCustom01" class="form-label">Product Name</label>
				<input type="text" class="form-control" name="pname" id="validationCustom01" required>

			</div>
			<div class="col-md-12">
				<label for="validationCustom02" class="form-label">Product Price</label>
				<input type="text" class="form-control" name="pprice" id="validationCustom02" required>
			</div>
			<?php
			$sql1 = "SELECT * from tbl_category";
			$result1 = mysqli_query($conn, $sql1); 
			?>
			<div class="col-md-12">
				<label for="validationCustom03" class="form-label">Product Category</label>
				<select class="form-control" name="pcategory" id="validationCustom03" required>
				
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
			<?php
			if($_SESSION['login']['role'] == 1){
			?>
			<div class="col-md-12">
				<label for="validationCustom10" class="form-label">Vendor Name</label>
				<select class="form-control" name="vendor" id="validationCustom10" required>
					<option value="">Select Vendor</option>
				</select>
			</div>
			<?php
			}
			?>

			<div class="col-md-12">
				<label for="validationCustom04"  class="form-label">Product Image</label>
				<input type="file" name="file" class="form-control" id="validationCustom04" required>
			</div>
			<div class="col-md-12">
				<label for="validationCustom05"  class="form-label">Description</label>
				<textarea class="form-control" name="pdesc" id="validationCustom05" cols="20" rows="3" required></textarea>
			</div>
			<div class="col-12">
				<button class="btn btn-primary mt-3" name="addProduct" type="submit">Submit</button>
			</div>
		</form>
		<script>
			(function () {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function (form) {
				form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
					}

					form.classList.add('was-validated')
				}, false)
				})
			})()
		</script>
      </div>
      </main>

  </div>
</div>

<script>
	$( "select[name='pcategory']" ).change(function () {
			var vendor_id = $(this).val();
			if(vendor_id) {
				$.ajax({
					url: "vendor-category.php",
					dataType: 'Json',
					data: {'id':vendor_id},
					success: function(data) {
						$('select[name="vendor"]').empty();
						$.each(data, function(key, value) {
							$('select[name="vendor"]').append('<option value="'+ key +'">'+ value +'</option>');
						});
					}
				});


			}else{
				$('select[name="vendor"]').empty();
			}
		});
</script>


<?php include_once("../admin/templates/footer.php"); ?>
