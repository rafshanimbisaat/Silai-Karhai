<?php
   require('db.php');
   $sql = "SELECT * FROM tbl_product
         WHERE vendor LIKE '%".$_GET['id']."%'"; 
         
    $result = mysqli_query($conn, $sql);


   $json = [];
   while($row = mysqli_fetch_array($result)){
        $json[$row['id']] = $row['product_name'];
   }


   echo json_encode($json);
?>