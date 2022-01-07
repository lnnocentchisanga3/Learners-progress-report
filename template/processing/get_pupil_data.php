<?php
require 'db_config.php';
session_start();
$user = $_SESSION['user_log_id'];

$pupilId = $_GET['pupil'];
$sub = $_GET['sub'];
$tnum = $_GET['tnum'];
$termnum = $_GET['termnum'];
$score = $_GET['score'];



$sql = mysqli_query($conn_db, "SELECT * FROM marks WHERE pupil_id='$pupilId' AND sub='$sub' AND term='$termnum' ");

if (mysqli_num_rows($sql) > 0) {
  echo "That score has been added Already";
}else{
  $query = mysqli_query($conn_db, "INSERT INTO marks(score,sub,testnum,term,pupil_id,teacher_id) VALUES('$score','$sub','$tnum','$termnum','$pupilId','$user')");

if ($query) {
  echo "Pupil score has been added successfully";
}else{
  echo "Error : ".mysqli_error($conn_db);
}
}
?>