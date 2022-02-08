<?php
session_start(); 
require("../db.php");

$id = $_GET["id"];
$sql = "DELETE FROM tbl_product WHERE id='".$id."'";
$result = mysqli_query($conn, $sql);
if($result){
    ?>
        <script>
            window.location.href = "products.php";
        </script>
    <?php
}
else{
    echo "Error while delete user";
}

?>