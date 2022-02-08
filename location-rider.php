<?php
   require('db.php');
   $sql = "SELECT * FROM tbl_user
         WHERE locations LIKE '%".$_GET['locations']."%' AND roles=3"; 
         
    $result = mysqli_query($conn, $sql);


   $json = [];
   while($row = mysqli_fetch_array($result)){
        $json[$row['id']] = $row['name'];
   }

   echo json_encode($json);
?>