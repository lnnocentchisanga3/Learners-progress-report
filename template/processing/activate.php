<?php
  
require "db_config.php";
  
    if (isset($_GET['id'])){
  
        $id=$_GET['id'];
  
        $sql="UPDATE `users` SET `status`='active' WHERE user_log_id='$id'";

        $query = mysqli_query($conn_db, $sql);

        if ($query) {
             // Go back 
            header('location: ../index.php');
        }else{
            echo "Error : ".mysqli_error($conn_db);
        }
  
        // Execute the query
        mysqli_query($conn_db,$sql);
    }
  
   
?>