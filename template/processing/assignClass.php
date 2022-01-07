<?php
session_start();
require "./db_config.php";

$userid = $_GET['userId'];
$class = $_GET['class'];

if (empty($class)) {
  echo"The class field is empty";
}else{

  $get_class = mysqli_query($conn_db, "SELECT * FROM class WHERE class ='$class' ");

if (mysqli_num_rows($get_class) == null || mysqli_num_rows($get_class) == 0 ) {

      $sql = "INSERT INTO class(teacher_id,class) VALUES('$userid','$class')";
    $query = mysqli_query($conn_db ,$sql);

    if ($query) {
    $add_teacher = mysqli_query($conn_db, "INSERT INTO teachers(user_id) VALUES('$userid')");
    if ($add_teacher) {
       echo 'Class Assigned successfully';
    }else{
       echo 'Class not Assigned an error occoured, Try again';
    }
    }else{
    echo 'Opps! an error occoured please try again';
    }
}else{
  echo "The class is already Assigned";
}

}

?>