<?php
session_start();
require './db_config.php';

$query = mysqli_query($conn_db, "SELECT * FROM users WHERE user_log_id ='$_SESSION[userid]' ");

if ($query && $_SESSION['userid']) {
	$get_user = mysqli_fetch_array($query);
	$_SESSION['userid'] = $get_user['user_id'];
	$_SESSION['user_log_id'] = $get_user['user_log_id'];
	$_SESSION['phone'] = $get_user['phone'];
	$_SESSION['user_type'] = $get_user['user_type'];
	$_SESSION['status'] = $get_user['status'];


	$user = $_SESSION['user_log_id'];

	$date = date("Y/m/d");

	$date_time = date("H:i:s");


	$log = "INSERT INTO logs(user_id,log_time,status,date_added) VALUES('$user','$date_time','login','$date')";

	$query1 = mysqli_query($conn_db, $log);

	if ($query1) {
		header("location: ../index.php");
	}else{
		header("location: ../../index.php?login=try_again");
	}
}else{

	header("location: ../../index.php?login=error_user_not_set");
}



?>