<?php

session_start();

if (isset($_SESSION['login']["email"])) {
	session_destroy();
	header("location:login.php");
}else{
	header("location:index.php");
}


?>