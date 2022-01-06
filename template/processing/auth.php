<?php
require './db_config.php';


if (isset($_POST['login'])) {

	/*Geting values from the form*/
	
	$userid = mysqli_real_escape_string($conn_db, $_POST['userid']);
	$pwd = mysqli_real_escape_string($conn_db, $_POST['pwd']);

	/*converting values to uppercase*/

	$converted_str = strtoupper($userid);


	echo $converted_str." "." ".$pwd;


/*getting the users from the database*/

	$get_user = "SELECT * FROM users WHERE user_log_id = '$converted_str' ";

	$get_user_query = mysqli_query($conn_db, $get_user);

	$get_user_data = mysqli_fetch_array($get_user_query);

if ($get_user_data) {
	session_start();
	$_SESSION['userid'] = $get_user_data['user_log_id'];
	if ($pwd == $get_user_data['password']) {

		switch ($get_user_data['user_type']) {
		  case "admin":
		    header("location: ./session.php");
		    break;
		  case "Teacher":
		     header("location: ./session_teacher.php");
		    break;
		  case "subjectteacher":
		    echo "You are a subject teacher!";
		    break;
		  default:
		    echo "Your favorite color is neither red, blue, nor green!";
		}

		
	}else{
		header("location: ../../index.php?login=error_pwd_invalid");
	}
}else{
	header("location: ../../index.php?login=error_user_was_not_found");
}
	
}
?>