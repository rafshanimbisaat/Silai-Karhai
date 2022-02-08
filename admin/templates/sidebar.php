<?php
 require("../db.php");
 ?>
<nav class="col-md-2 d-none d-md-block bg-dark sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">

          <?php 
            $uri = $_SERVER['REQUEST_URI']; 
            $uriAr = explode("/", $uri);
            $page = end($uriAr);

          ?>

        <?php if($_SESSION['login']['role'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>" href="index.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['login']['role'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'customer_orders.php') ? 'active' : ''; ?>" href="customer_orders.php">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['login']['role'] == 3){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == '../rider/riderOrder.php') ? 'active' : ''; ?>" href="../rider/riderOrder.php">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <?php } ?>
           <?php if($_SESSION['login']['role'] == 3){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == '../rider/completeOrder.php') ? 'active' : ''; ?>" href="../rider/completeOrder.php">
              <span data-feather="file"></span>
              Completed Orders
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['login']['role'] == 2){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == '../vendor/vendorOrder.php') ? 'active' : ''; ?>" href="../vendor/vendorOrder.php">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <?php } ?>
         <!--  <?php if($_SESSION['login']['role'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'https://silaikarai.000webhostapp.com/admin/addProducts.php') ? 'active' : ''; ?>" href="https://silaikarai.000webhostapp.com/admin/addProducts.php">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <?php } ?> -->
          <?php if($_SESSION['login']['role'] == 2){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'https://silaikarai.000webhostapp.com/admin/addProducts.php') ? 'active' : ''; ?>" href="https://silaikarai.000webhostapp.com/admin/addProducts.php">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['login']['role'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'https://silaikarai.000webhostapp.com/admin/products.php') ? 'active' : ''; ?>" href="https://silaikarai.000webhostapp.com/admin/products.php">
              <span data-feather="shopping-cart"></span>
              View Products
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['login']['role'] == 2){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'https://silaikarai.000webhostapp.com/admin/products.php') ? 'active' : ''; ?>" href="https://silaikarai.000webhostapp.com/admin/products.php">
              <span data-feather="shopping-cart"></span>
              View Products
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['login']['role'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'https://silaikarai.000webhostapp.com/admin/addCategory.php') ? 'active' : ''; ?>" href="https://silaikarai.000webhostapp.com/admin/addCategory.php">
              <span data-feather="shopping-cart"></span>
              Category
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['login']['role'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'https://silaikarai.000webhostapp.com/admin/category.php') ? 'active' : ''; ?>" href="https://silaikarai.000webhostapp.com/admin/category.php">
              <span data-feather="shopping-cart"></span>
              View Category
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['login']['role'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'contact.php') ? 'active' : ''; ?>" href="contact.php">
              <span data-feather="users"></span>
              Contact Information
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['login']['role'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'feedback.php') ? 'active' : ''; ?>" href="feedback.php">
              <span data-feather="users"></span>
              View Feedback
            </a>
          </li>
          <?php } ?>
        </ul>

       
      </div>
    </nav>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 ">

        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
           
          </div>
         
        </div>
      </div>