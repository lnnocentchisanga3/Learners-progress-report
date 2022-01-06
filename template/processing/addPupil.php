<?php
session_start();
require "./db_config.php";

$pupil = $_GET['pupil'];
$class = $_GET['class'];

if (empty($pupil)) {
  echo "The Pupil field is empty";
}else{

  $get_class = mysqli_query($conn_db, "SELECT * FROM pupils WHERE pupil_name ='$pupil' AND class ='$class' ");

if (mysqli_num_rows($get_class) == null || mysqli_num_rows($get_class) == 0 ) {

      $sql = "INSERT INTO pupils(pupil_name,class) VALUES('$pupil','$class')";
    $query = mysqli_query($conn_db ,$sql);

    if ($query) {
     echo 'Pupil Added successfully';
    }else{
    echo 'Opps! an error occoured please try again';
    }
}else{
  echo "The Pupil is already Added";
}

}
?>