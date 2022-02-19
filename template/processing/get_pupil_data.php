<?php
require 'db_config.php';
session_start();
$user = $_SESSION['user_log_id'];

$pupilId = $_GET['pupil'];
$sub = $_GET['sub'];
/*$tnum = $_GET['tnum'];*/
$termnum = $_GET['termnum'];
$score = $_GET['score'];
$score1 = $_GET['score1'];
$score2 = $_GET['score2'];



$sql = mysqli_query($conn_db, "SELECT * FROM marks  WHERE pupil_id='$pupilId' ");
$row = mysqli_fetch_array($sql);

if ($score != $row['score'] || $score1 != $row['score_1'] || $score != $row['score_2']) {

 $query = mysqli_query($conn_db, "INSERT INTO marks(`score`,`score_1`,`score_2`,`sub`,`term`,`pupil_id`,`teacher_id`) VALUES('$score','$score1','$score2','$sub','$termnum','$pupilId','$user')");

if ($query) {
  echo "Pupil score has been added successfully";
}else{
  echo "Error : ".mysqli_error($conn_db);
}

}else{
    echo "The score record has been added Already";
  }
?>