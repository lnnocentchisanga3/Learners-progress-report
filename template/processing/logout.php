<?php
require "db_config.php";

if (isset($_GET['user'])) {
	$user = $_GET['user'];

	$date = date("Y/m/d");

	$date_time = date("H:i:s");


$log = "INSERT INTO logs(user_id,log_time,status,date_added) VALUES('$user','$date_time','logout','$date')";

$query = mysqli_query($conn_db, $log);

if ($query) {
	session_start();
	session_unset();
	session_destroy();

	header("location: ../../index.php");
}else{
	header("location: ../index.php?action=logout_error");

	/*echo "Error : ".mysqli_error($conn_db);*/
}
}



/**/

?>