<?php
session_start(); 
require("../db.php");

$id = $_GET["id"];
$sql = "DELETE FROM tbl_category WHERE id='".$id."'";
$result = mysqli_query($conn, $sql);
if($result){
    ?>
        <script>
            window.location.href = "category.php";
        </script>
    <?php
}
else{
    echo "Error while delete user";
}

?>