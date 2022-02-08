<?php
require("../db.php");

session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $data = [];
    
    $query = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password' AND is_verified = 1";
    $res = mysqli_query($conn, $query);
    $check = $res->num_rows;
    $count = mysqli_num_rows($res);
    while($row = $res->fetch_assoc()) {
        $data = ['id' => $row['id'], 'role' => $row["roles"], 'email' => $row['email']];
    }


    if ($count == 1 && $data['role'] == 1){    
        $_SESSION['login'] = $data;
        ?>
        <script>
            window.location.href = "index.php";
        </script>
        <?php
    }
    else if($count == 1 && $data['role'] == 4){
        $_SESSION['login'] = $data;
       ?>
       <script>
           window.location.href = "../index.php";
       </script>
       <?php
    }
    else if($count == 1 && $data['role'] == 2){
        $_SESSION['login'] = $data;
       ?>
       <script>
           window.location.href = "../vendor/vendorOrder.php";
       </script>
       <?php
    }
    else if($count == 1 && $data['role'] == 3){
        $_SESSION['login'] = $data;
       ?>
       <script>
            window.location.href = "../rider/riderOrder.php";
       </script>
       <?php
    }
    else{
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                swal("You have entered an invalid username or password")
            });
        </script>
        <?php
    }
}

?>


<body>
<div class="container container-login100">

            <div class="card login-card">
                <div class="card-header text-center">
                <img src="../assets/images/logo.png" alt="Logo" height="100" width="200">
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="email" name="email" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password" required>
                        </div>
                      
                        <div class="form-group text-right">
                            <a href="https://silaikarai.000webhostapp.com/" class="btn btn-danger">Back</a>
                            <input type="submit" value="Sign In" name="login" class="btn login_btn register-btn">
                        </div>
                        <div class="form-group text-center" style="margin-bottom: 0px;">
                            Create a new account ? <a href="myregister.php" style="text-decoration:none; color:#de771c">Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</body>

</html>