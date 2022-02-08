
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Silai Karhai</title>
    <link rel=”stylesheet” href=”css/bootstrap.css”>
    <link rel=”stylesheet” href=”css/bootstrap-responsive.css”>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <style>
        #ex4 .p1[data-count]:after{
            position:absolute ;
            right:10%;
            top:8%;
            content: attr(data-count);
            font-size:40%;
            padding:.2em;
            border-radius:50%;
            line-height:1em;
            color: white;
            background:#de771c;
            text-align:center;
            min-width: 1em;
            margin-top:-5px !important;

            /* font-weight:bold; */
        }
        i{
            margin-top:-1px !important;
            color: black;
        }
        i:hover{
            color: #de771c !important;
        }
    </style>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php"><img src="assets/images/logo.png" width="200" 
                            height="150" style="margin-top:-70px; margin-left: -90px; ">
                                   </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a class="<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active' ?>" href="index.php">Home</a></li>
                            <li><a href="services.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'services.php') echo 'active' ?>">Services</a></li>
                         <!-- <li><a href="checkout.php">Checkout</a></li> -->
                            <li class="dropdown">
                                <a class="dropdown-toggle <?php if ((basename($_SERVER['PHP_SELF']) == 'about.php') == "about.php" || (basename($_SERVER['PHP_SELF']) == 'blog.php') == "blog.php" || (basename($_SERVER['PHP_SELF']) == 'testimonials.php') == "testimonials.php") echo 'active' ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                              
                                <div class="dropdown-menu" style="background:white; border-bottom:1px black solid">
                                    <a class="dropdown-item" style="border-bottom:1px black solid" href="about.php">About Us</a>
                                    <!-- <a class="dropdown-item" style="border-bottom:1px black solid" href="blog.php">Blog</a> -->
                                    <a class="dropdown-item" style="border-bottom:1px black solid" href="testimonials.php">Testimonials</a>
                                    <a class="dropdown-item" style="border-bottom:1px black solid" href="terms.php">Terms</a>
                                    <a class="dropdown-item" style="border-bottom:1px black solid" href="privacy-policy.php">Privacy Policy</a>
                                </div>
                            </li>
                            <?php
                            if (isset($_SESSION['login']['email'])) {
                            ?> 
                            <li><a class="<?php if (basename($_SERVER['PHP_SELF']) == 'orders.php') echo 'active' ?>" href="orders.php">Orders</a></li>
                            <?php
                            }
                            ?>
                            <li><a class="<?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'active' ?>" href="contact.php">Contact</a></li>
                           
                            <li><a class="<?php if (basename($_SERVER['PHP_SELF']) == 'feedback.php') echo 'active' ?>" href="feedback.php">Feedback</a></li>
                            <li><a class="<?php if (basename($_SERVER['PHP_SELF']) == 'trackOrder.php') echo 'active' ?>" href="trackOrder.php">Track Order</a></li>
                             <?php
                            if (isset($_SESSION['login']['email'])) {
                            ?> 
                                <li><a href="./admin/admin-logout.php">Logout</a></li> 
                                <?php
                            }else{
                                ?>
                            <li><a href="./admin/login.php">Sign In</a></li> 
                            <?php
                                    }
                            ?>
                            <?php 
                            $qty_sum = 0;
                            if(isset($_SESSION['cart'])){
                                $qty_sum = array_sum(array_column($_SESSION['cart'], 'quantity'));
                            }
                            
                            ?>
                            <li id="ex4">
                                <span class="p1 fa-stack fa-2x has-badge" data-count="<?php echo $qty_sum; ?>">
                                <a href="product-details-tailoring.php">
                                    <i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse" data-count="4b"></i>
                                </a>
                                </span>
                            </li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
      <!-- ***** Header Area End ***** -->