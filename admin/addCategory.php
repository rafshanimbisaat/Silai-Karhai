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
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<?php include "./templates/sidebar.php"; ?>
<?php
if(isset($_POST['addCategory'])){
    $categoryName = $_POST['cname'];
	$file = $_FILES['file'];

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
                $fileDestination = "assets/images/category/".$fileNameNew;
                if(move_uploaded_file($fileTmpName, $fileDestination)){
                    $sql = "INSERT INTO tbl_category (category_name, image) VALUES ('".$categoryName."', '".$fileNameNew."')";
					$result = mysqli_query($conn, $sql);
                    if(!$result){
                        echo "Failed";
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
<br><br>
<h2>Add Category</h2>
<div class="container-fluid">

<div class="row">
<div class="col-md-12">
		<form method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
			<div class="col-lg-12">
				<label for="validationCustom01" class="form-label">Category Name</label>
				<input type="text" class="form-control" name="cname" id="validationCustom01" required>
			</div>
			<div class="col-lg-12">
				<label for="validationCustom02"  class="form-label">Category Image</label>
				<input type="file" name="file" class="form-control" id="validationCustom02" required>
			</div>
            <div class="col-md-12">
                <button class="btn btn-primary mt-3" name="addCategory" type="submit">Submit</button>
            </div>
		</form>
        </div>
        </div>
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
      </div>
      </main>

 



<?php include_once("./templates/footer.php"); ?>
