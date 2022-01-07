<?php
  
require "db_config.php";
  
    if (isset($_GET['id'])){
  
        $$row_get_teachers=$_GET['user_log_id'];
  
        $sql="UPDATE `courses` SET 
             `status`=1 WHERE id='$course_id'";
  
        // Execute the query
        mysqli_query($conn_db,$sql);
    }
  
    // Go back 
    header('location: index.php');
?>