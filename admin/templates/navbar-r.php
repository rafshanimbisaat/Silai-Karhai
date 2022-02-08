 <?php
if(!isset($_SESSION)){
session_start();
}
// die($_SESSION['email'] );
 ?>
 <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#" style=" font-weight:bold">Rider Panel</a>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    	<?php
    		if (isset($_SESSION['login']['email'])) {
    			?>
    				<a class="btn nav-link" href="../admin/admin-logout.php">Sign out</a>
    			<?php
    		}else{
    			?>
					<a class="nav-link" href="../admin/login.php">Log In</a>
				<?php
    			}


    	?>
      
    </li>
  </ul>
</nav>