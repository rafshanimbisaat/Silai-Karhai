<?php
error_reporting(0);
include "../db.php"; 

include "./templates/top.php";

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = md5($_POST["password"]);
  $roles = $_POST["roles"];
  $cnic = $_POST["cnic"];
  $vendorCat = $_POST["vendorcat"];
  $aggrement = $_POST["aggrement"];
  $locations = $_POST["locations"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];


  $sql= "SELECT * FROM tbl_user WHERE email='".$email."'";
  $result =mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);

    if($email==$row['email']){
      ?>
      <script>
        document.addEventListener("DOMContentLoaded", function(event) {
              swal("Email Already Exists")
            });
      </script>
      <?php
    }
    else{
      $query = "INSERT INTO tbl_user (name, email, password, roles, cnic, vendorCat, agreeTerms, locations, phone, address) VALUES ('".$name."', '".$email."', '".$password."', '".$roles."', '".$cnic."', '".settype($vendorCat,'int')."', '".$aggrement."', '".$locations."', '".$phone."', '".$address."')";
      $res = mysqli_query($conn, $query);
      if($res){
    $to      =  $email;
    $subject = 'Account Created';
    $message = 'CONGRATULATIONS! Account Created You will notify soon about activation of your account';
    $headers = 'From: support@silaikarai.com';

    mail($to, $subject, $message, $headers);
  
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
              swal("You are successfully registered").then(okay => {
                if (okay) {
                    window.location.href = "login.php";
                }
                });
            });
        </script>
        <?php
      }
      else{
        die('Error: ' . mysqli_error($conn));
      }
    }
     
  }
 

?>

<style>
.register-btn{
  background-color: #de771c;
  border: none;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

  }
  .register-btn a:hover {
      background-color: #d46e14;
      color: #fff;
  }
  body {
  background-color: #2c333b;
  background-image: url(../assets/images/loginbg.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<div class="container">
	<div class="row justify-content-center" style="margin:50px 0;">
		<div class="col-md-4">
    <div class="card login-card">
    <div class="card-header text-center">
                <img src="../assets/images/logo.png" alt="Logo" height="100" width="200">
                </div>
                <div class="card-body">
			<!-- <h2 class="text-center">User Registeration</h4> -->
			<p class="message"></p>
			<form id="admin-register-form" method="POST" onsubmit="return validatePassword()">
			  <div class="form-group">
			    <label for="name" class="font-weight-bold" >Name</label>
			    <input type="text" class="form-control" name="name" id="name" onchange="check_name()" onblur="validatePassword()" placeholder="Enter Name" >
          <span id="error-name" style="color:red"></span>
			  </div>
			  <div class="form-group">
			    <label for="email" class="font-weight-bold" >Email address</label>
			    <input type="email" class="form-control" name="email" onchange="check_email()" onblur="validatePassword()" id="email" placeholder="Enter email" >
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          <span id="error-email" style="color:red"></span>
			  </div>
			  <div class="form-group">
			    <label for="password" class="font-weight-bold" >Password</label>
			    <input type="password" class="form-control" name="password" onchange="check_password()" onblur="validatePassword()" id="password" placeholder="Password" >
          <span id="error-password" style="color:red"></span>
			  </div>
			  <div class="form-group">
			    <label for="cpassword" class="font-weight-bold" >Confirm Password</label>
			    <input type="password" class="form-control" name="cpassword" onchange="check_confirm()" id="cpassword" placeholder="Password" >
          <span id="error-cpassword" style="color:red"></span>
			  </div>
        <div class="form-group" >
			    <label for="roles" class="font-weight-bold">Select Role</label>
			    <select name="roles" id="roles" onchange="check_role(); showMe(this);" onblur="validatePassword()" class="form-control" required>
            <option value="">Select Role</option>
            <option value="2">Vendor</option>
            <option value="3">Rider</option>
            <option value="4">Customer</option>
          </select>
          <span id="error-roles" style="color:red"></span>
			  </div>
        <div class="form-group" id="showCnic" style="display:none">
			    <label for="cnic" class="font-weight-bold" >CNIC</label>
			    <input type="text" class="form-control" name="cnic" id="cnic" placeholder="xxxxx-xxxxxxx-x" required>
          <span id="error-cnic" style="color:red"></span>
			  </div>
        <div class="form-group" id="showCat" style="display:none">
			    <label for="vendorcat" class="font-weight-bold" >Vendor Categories</label>
			    <select name="vendorcat" id="vendorcat" class="form-control" required>
            <option value="">Select Vendor Categories</option>
            <?php 
              $sql2 = "SELECT * FROM tbl_category";
              $query2 = mysqli_query($conn, $sql2);
              while($rows = mysqli_fetch_array($query2)){
             ?>
             <option value="<?php echo $rows['id'] ?>"><?php echo $rows['category_name'] ?></option>
             <?php } ?>
          </select>
			  </div>
        <div class="form-group" id="showLoc" style="display:none">
			    <label for="locations" class="font-weight-bold" >Location</label>
			    <select name="locations" id="locations" class="form-control" required>
            <option value="">Select Location</option>
            <option value="North Nazimabad Karachi">North Nazimabad Karachi</option>
            <option value="Gulshan Karachi">Gulshan Karachi</option>
            <option value="Bahadurabad Karachi">Bahadurabad Karachi</option>
            <option value="Pechs Karachi">Pechs Karachi</option>
            <option value="Johar Karachi">Johar Karachi</option>
            <option value="Tariq Road Karachi">Tariq Road Karachi</option>
            <option value="DHA Karachi">DHA Karachi</option>
          </select>
			  </div>
        <div class="form-group" id="showPhone" style="display:none">
			    <label for="phone" class="font-weight-bold" >Mobile Number</label>
			    <input type="text" class="form-control" name="phone" id="phone" placeholder="xxxx-xxxxxxx" required>
          <span id="error-phone" style="color:red"></span>
			  </div>
        <div class="form-group" id="showAddress" style="display:none">
			    <label for="address" class="font-weight-bold" >Address</label>
			    <textarea name="address" id="address" cols="10" rows="3" class="form-control" placeholder="Enter Your Address" required></textarea>
          <span id="error-address" style="color:red"></span>
			  </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="aggrement" value="1" id="aggrement" required>
          <label class="form-check-label" for="aggrement">
              By clicking Sign Up, you agree to our <a href="../terms.php" style="text-decoration:none;"> Terms </a> of services, & <a href="../privacy-policy.php" style="text-decoration:none;">Privacy Policy</a>
          </label>
        </div>
			  <input type="hidden" name="admin_register" value="1">
        <br>
			  <button type="submit" name="submit" class="register-btn">Sign Up</button>
        <div class="mt-2">
           Already have an account ? <a href="login.php" style="text-decoration:none; color:#de771c">Sign In</a>
        </div>
			</form>
      </div>
      </div>
      <script>
        function validatePassword() {
          var name = document.getElementById('name').value;
          var email = document.getElementById('email').value;
          var newPassword = document.getElementById('password').value;
          var cpassword = document.getElementById('cpassword').value;
          var roles = document.getElementById('roles').value;
          var cnic = document.getElementById('cnic').value;
          if(name == ""){
            document.getElementById('error-name').innerHTML = "Please enter your name";
            return false;
          }

          if(email == ""){
            document.getElementById('error-email').innerHTML = "Please enter your email";
            return false;
          }

          if(newPassword == ""){
            document.getElementById('error-password').innerHTML = "Please enter your password";
            return false;
          }

          if(cpassword == ""){
            document.getElementById('error-cpassword').innerHTML = "Please enter confirm password";
            return false;
          }

          if(roles == ""){
            document.getElementById('error-roles').innerHTML = "Please select role";
            return false;
          }
          
          // var minNumberofChars = 8;
          var regularExpression  = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
          if(!regularExpression.test(newPassword)) {
              document.getElementById('error-password').innerHTML = "Password should contain 8 character atleast one number and one special character";
              return false;
          }

          if(newPassword != cpassword){
            document.getElementById('error-password').innerHTML = "Passoword do not match";
            return false;
          }

          if(newPassword == cpassword){
            document.getElementById('error-password').innerHTML = "";
            return true;
          }

      }
      function check_name(){
        var name = document.getElementById('name').value;
        if(name != ""){
            document.getElementById('error-name').innerHTML = "";
            return true;
          }
      }

      function check_email(){
        var email = document.getElementById('email').value;
        if(email != ""){
            document.getElementById('error-email').innerHTML = "";
            return true;
          }
      }

      function check_password(){
        var newPassword = document.getElementById('password').value;
        if(newPassword != ""){
            document.getElementById('error-password').innerHTML = "";
            return true;
          }
      }

      function check_confirm(){
        var cPassword = document.getElementById('cpassword').value;
        if(cPassword != ""){
            document.getElementById('error-cpassword').innerHTML = "";
            return true;
          }
      }

      function check_role(){
        var roles = document.getElementById('roles').value;
        if(roles != ""){
            document.getElementById('error-roles').innerHTML = "";
            return true;
          }
      }

        function showMe(e) {
            var strdisplay = e.options[e.selectedIndex].value;
            var cnic = document.getElementById("showCnic");
            var address = document.getElementById("showAddress");
            var phone = document.getElementById("showPhone");
            var location = document.getElementById("showLoc");
            var vendorCat = document.getElementById("showCat");
         
            if(strdisplay == "2" || strdisplay == "3") {
              cnic.style.display = "block";
              address.style.display = "block";
              phone.style.display = "block";
              location.style.display = "block";
            } else {
              cnic.style.display = "none";
              address.style.display = "none";
              phone.style.display = "none";
              location.style.display = "none";
            }

            if(strdisplay == "2" ){
              vendorCat.style.display = "block";
            }
            else{
              vendorCat.style.display = "none";
            }

            if( document.getElementById("roles").value === "4"){
              var cnicInput = document.getElementById("cnic");
              var phoneInput = document.getElementById("phone");
              var addressInput = document.getElementById("address");
              var locationInput = document.getElementById("locations");
              var vendorInput = document.getElementById("vendorcat");
              cnicInput.removeAttribute("required");
              phoneInput.removeAttribute("required");
              addressInput.removeAttribute("required");
              locationInput.removeAttribute("required");
              vendorInput.removeAttribute("required");
            }

            if( document.getElementById("roles").value === "3"){
              var vendorInput = document.getElementById("vendorcat");
              vendorInput.removeAttribute("required");
            }
        }

        
      </script>
		</div>
	</div>
</div>






<?php include "./templates/footer.php"; ?>

 <!--<script type="text/javascript" src="./js/main.js"></script> -->
