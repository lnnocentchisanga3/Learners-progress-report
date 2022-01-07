<?php
require "db_config.php";
        $$row_get_teachers=$_GET['user_log_id'];
  
        $sql="UPDATE `courses` SET 
            `status`=0 WHERE id='$course_id'";

        mysqli_query($con,$sql);
    }
  
    header('location: index.php');
?>