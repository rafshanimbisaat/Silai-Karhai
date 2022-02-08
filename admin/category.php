<?php 
  require("../db.php");
  session_start(); 
  include_once("./templates/top.php"); 
  include_once("./templates/navbar.php"); 

  $sql = "SELECT * from tbl_category";
  $result = mysqli_query($conn, $sql); 


?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>
<br><br>
      <div class="row">
      	<div class="col-10">
      		<h2>Category List</h2>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody >
          <?php
             while($roww = mysqli_fetch_array($result)){
          ?>
            <tr>
              <th scope="row"><?php echo $roww["id"] ?></th>
              <td><?php echo $roww["category_name"] ?></td>
              <td><img src="assets/images/category/<?php echo $roww['image'];?>" alt="Category Image" height="50" width="75"></td>
              <td><a href="#" class="editCategory btn btn-primary" data-id="<?php echo $roww["id"] ?>" data-toggle="modal" data-image="assets/images/category/<?php echo $roww['image'];?>" data-target="#editCategory">Edit</a>&nbsp;&nbsp;<a href="deleteCategory.php?id=<?php echo $roww['id'] ?>" class="btn btn-danger delete" data-confirm="Are you sure you want to delete this category ?">Delete</a></td>
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
  if(isset($_POST['categoryUpdate'])){
    $id = $_POST['update_id'];
    $category_name = $_POST['cname'];
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
                    $sql = "UPDATE tbl_category SET category_name = '$category_name', image='$fileNameNew' WHERE id = $id";                    
                    $result = mysqli_query($conn, $sql);
                    if($result){
                    ?>
                        <script>
                          window.location.href = "category.php";
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
      $sql = "UPDATE tbl_category SET category_name = '$category_name' WHERE id = $id";
      $result = mysqli_query($conn, $sql);
      if($result){
        ?>
          <script>
            window.location.href = "category.php";
          </script>
        <?php
      }
    }
}
                
            

?>

<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" enctype="multipart/form-data">
        	<div class="row">
            <input type="hidden" name="update_id" id="update_id">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Category Name</label>
		        		<input type="text" name="cname" id="cname" class="form-control">
		        	</div>
        		</div>
            <div class="col-12">
        		  <div class="form-group">
                <label for="image" class="col-form-label">Category Image:</label>
                <input type="file" class="form-control"  name="file">
                <img src="" class="mt-2" id="image" height="100px" width="200px">
              </div>
        	  </div>
        		</div>
        		<div class="col-12">
        			<button type="submit" name="categoryUpdate" class="btn btn-primary add-product">Update</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    var table = $("#dataTable").DataTable();
    table.on("click", ".editCategory", function(){
      $tr = $(this).closest('tr');
      console.log('tr', $tr);
      if($($tr).hasClass('child')){
        $tr = $tr.prev('.parent');
        console.log('in here');
      }
      var data = table.row($tr).data();
      $('#update_id').val(data[0]);
      $('#cname').val(data[1]);
      $('#image').attr("src",$(this).data('image'));
    })
</script>

<?php include_once("./templates/footer.php"); ?>