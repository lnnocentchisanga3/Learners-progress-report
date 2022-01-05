<?php
session_start();
require "./db_config.php";

$userid = $_GET['userId'];
$class = $_GET['class'];

$get_class = mysqli_query($conn_db, "SELECT * FROM class WHERE class ='$class' ");

if (mysqli_num_rows($get_class) == null || mysqli_num_rows($get_class) == 0 ) {

      $sql = "INSERT INTO class(teacher_id,class) VALUES('$userid','$class')";
    $query = mysqli_query($conn_db ,$sql);

    if ($query) {
     echo 'Class Assigned successfully';
    }else{
    echo 'Opps! an error occoured please try again';
    }
}else{
  echo "The class is already Assigned";
}




?>