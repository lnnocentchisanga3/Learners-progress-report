<?php
require "db_config.php";
if(isset($_GET['edit']))
{
$id = $_GET['edit'];
$query = "SELECT teacher_id, user_id FROM teachers WHERE id= $teacher_id";
$result = mysqli_query($conn_db, $query);
$editData= mysqli_fetch_assoc($result);
$teacher_id = $editData['teacher_id'];
$user_id    = $editData['user_id'];
 header("Location:/update_teacher.php");
exit();

}

?>