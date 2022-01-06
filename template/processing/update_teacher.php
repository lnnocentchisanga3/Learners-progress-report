<?php 
require "db_config.php";
if(isset($_POST['update']) && isset($_GET['edit'])){
   $id = $_GET['edit'];
   $teacher_id= $_POST['teacher_id'];
   $user_id= $_POST['user_id'];
   $query   =  "UPDATE developers SET
                teacher_id='$teacher_id',
                user_id  = '$user_id',
                WHERE id = '$teacher_id'";
  
  $execute= mysqli_query($conn_db, $query);
  if($execute== true){
      header("location:index.php");
      exit();
  }else{
      echo  $conn->error;
  }
  echo  $conn->error;
}
?>