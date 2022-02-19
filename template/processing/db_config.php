<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "learners_progress";


try {

	$conn_db = mysqli_connect($servername,$username,$password,$db_name);
	
} catch (Exception $e) {
	echo "Error :".$e->getMessage();
}

?>